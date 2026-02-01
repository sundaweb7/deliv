<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class FcmV1ServiceTest extends TestCase
{
    public function test_gets_token_and_sends_message()
    {
        // configure project id and a fake service account so service picks v1 mode
        $sa = [
            'type' => 'service_account',
            'project_id' => 'proj-abc',
            'private_key' => "-----FAKE-KEY-----",
            'client_email' => 'sa@proj.iam.gserviceaccount.com'
        ];

        // set config so constructor picks up project id and service account
        config(['services.fcm.project_id' => 'proj-abc']);
        config(['services.fcm.service_account_json' => json_encode($sa)]);

        // mock the service to bypass JWT signing and return an access token
        $mock = \Mockery::mock(\App\Services\FcmV1Service::class)->makePartial();
        $mock->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getAccessToken')->andReturn('ya29.token');

        // set internal properties on mock so sendToToken builds correct URL (protected properties via reflection)
        $ref = new \ReflectionObject($mock);
        $p1 = $ref->getProperty('projectId'); $p1->setAccessible(true); $p1->setValue($mock, 'proj-abc');
        $p2 = $ref->getProperty('serviceAccount'); $p2->setAccessible(true); $p2->setValue($mock, ['client_email' => 'sa@proj.iam.gserviceaccount.com']);

        $this->instance(\App\Services\FcmV1Service::class, $mock);

        // fake the FCM send endpoint
        Http::fake([
            'https://fcm.googleapis.com/*' => Http::response(['name' => 'projects/proj-abc/messages/123'], 200),
        ]);

        $svc = app(\App\Services\FcmV1Service::class);

        $ok = $svc->sendToToken('tok-1', 'Hello', 'World');

        $this->assertTrue($ok);

        Http::assertSent(function ($request) {
            return Str::startsWith($request->url(), 'https://fcm.googleapis.com/v1/projects/proj-abc/messages:send') && $request->method() === 'POST'
                && strpos($request->body(), 'tok-1') !== false;
        });
    }
}

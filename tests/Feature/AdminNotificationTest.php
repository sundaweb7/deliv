<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\DeviceToken;
use Mockery;

class AdminNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_manual_tokens_send_invokes_fcm_and_redirects_with_count()
    {
        $mock = Mockery::mock(\App\Services\FcmService::class);
        $mock->shouldReceive('sendToTokens')
            ->once()
            ->with(['tok1', 'tok2'], 'Hello', 'Body')
            ->andReturnTrue();

        $this->instance(\App\Services\FcmService::class, $mock);

        $res = $this->withSession(['admin_token' => 'ok'])
            ->post(route('admin.notifications.send'), [
                'title' => 'Hello',
                'body' => 'Body',
                'target' => 'manual',
                'manual_tokens' => 'tok1, tok2'
            ]);

        $res->assertRedirect(route('admin.notifications.index'));
        $res->assertSessionHas('success', 'Notification sent to 2 tokens');
    }

    public function test_target_customers_selects_customer_tokens_and_sends()
    {
        $u1 = User::factory()->create(['role' => 'customer']);
        $u2 = User::factory()->create(['role' => 'customer']);
        $u3 = User::factory()->create(['role' => 'driver']);

        DeviceToken::create(['user_id' => $u1->id, 'token' => 'c1']);
        DeviceToken::create(['user_id' => $u2->id, 'token' => 'c2']);
        DeviceToken::create(['user_id' => $u3->id, 'token' => 'd1']);

        $mock = Mockery::mock(\App\Services\FcmService::class);
        $mock->shouldReceive('sendToTokens')
            ->once()
            ->withArgs(function($tokens, $title, $body) {
                sort($tokens);
                return $tokens === ['c1', 'c2'] && $title === 'T' && $body === 'B';
            })
            ->andReturnTrue();

        $this->instance(\App\Services\FcmService::class, $mock);

        $res = $this->withSession(['admin_token' => 'ok'])
            ->post(route('admin.notifications.send'), [
                'title' => 'T',
                'body' => 'B',
                'target' => 'customers'
            ]);

        $res->assertRedirect(route('admin.notifications.index'));
        $res->assertSessionHas('success', 'Notification sent to 2 tokens');
    }

    public function test_no_tokens_does_not_call_fcm_and_returns_zero()
    {
        $mock = Mockery::mock(\App\Services\FcmService::class);
        $mock->shouldNotReceive('sendToTokens');
        $this->instance(\App\Services\FcmService::class, $mock);

        $res = $this->withSession(['admin_token' => 'ok'])
            ->post(route('admin.notifications.send'), [
                'title' => 'No',
                'body' => 'Tokens',
                'target' => 'drivers'
            ]);

        $res->assertRedirect(route('admin.notifications.index'));
        $res->assertSessionHas('success', 'Notification sent to 0 tokens');
    }
}

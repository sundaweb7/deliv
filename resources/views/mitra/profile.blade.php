@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

    <form method="post" action="{{ route('mitra.profile.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                </div>

                <div class="mb-3">
                    <label>Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-control">
                    @if($mitra->profile_photo)
                        <img src="{{ asset('storage/mitra-photos/' . $mitra->profile_photo) }}" style="height:80px;margin-top:6px;" />
                    @endif
                </div>

                <div class="mb-3">
                    <label>Store Photo</label>
                    <input type="file" name="store_photo" class="form-control">
                    @if($mitra->store_photo)
                        <img src="{{ asset('storage/mitra-store-photos/' . $mitra->store_photo) }}" style="height:80px;margin-top:6px;" />
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label>Business Name</label>
                    <input type="text" name="business_name" class="form-control" value="{{ old('business_name', $mitra->business_name) }}">
                </div>
                <div class="mb-3">
                    <label>WA Number</label>
                    <input type="text" name="wa_number" class="form-control" value="{{ old('wa_number', $mitra->wa_number) }}">
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="address" class="form-control">{{ old('address', $mitra->address) }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Address: Desa</label>
                    <input type="text" name="address_desa" class="form-control" value="{{ old('address_desa', $mitra->address_desa) }}">
                </div>
                <div class="mb-3">
                    <label>Address: Kecamatan</label>
                    <input type="text" name="address_kecamatan" class="form-control" value="{{ old('address_kecamatan', $mitra->address_kecamatan) }}">
                </div>
                <div class="mb-3">
                    <label>Address: Kabupaten</label>
                    <input type="text" name="address_regency" class="form-control" value="{{ old('address_regency', $mitra->address_regency) }}">
                </div>
                <div class="mb-3">
                    <label>Address: Province</label>
                    <input type="text" name="address_province" class="form-control" value="{{ old('address_province', $mitra->address_province) }}">
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Save Profile</button>
    </form>
</div>
@endsection
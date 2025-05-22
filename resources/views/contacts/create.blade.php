@extends('dashboard')
@section('content')
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <input type="hidden" name="contact_id" value="{{ $contact->id ?? '' }}">
                <div class="mb-3">
                    <label class="col-form-label">Name</label>
                    <input type="text" class="form-control" name="contact_name" placeholder="John Doe" value="{{ $contact->name ?? '' }}">
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Company</label>
                    <input type="text" class="form-control" name="contact_company" placeholder="ABCD company" value="{{ $contact->company ?? '' }}">
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Phone</label>
                    <input type="text" class="form-control" name="contact_phone" placeholder="123-456-2890" value="{{ $contact->phone ?? '' }}">
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Email</label>
                    <input type="email" class="form-control" name="contact_email" placeholder="john@doe.com" value="{{ $contact->email ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
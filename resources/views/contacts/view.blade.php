@extends('dashboard')

@section('css')
    @parent
@endsection

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-success" href="/contacts/create">
            Add Contact
        </a>
    </div>

    <div class="row justify-content-end">
        <div class="col-12 col-md-3">
            <div class="input-group mb-3">
                <input type="text" name="search_contact" class="form-control" placeholder="Search something here">
                <button class="btn btn-outline-secondary search-contact" type="button">Search</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody id="contact-results">
                @forelse ($contacts as $contact)
                    <tr id="contact-{{ $contact->id }}">
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->company }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            <a href="{{ route('contacts.show', ['contact' => $contact->id]) }}">Edit</a>
                            <a href="javascript:void(0)" onclick="deleteContact('{{ route('contacts.destroy', ['contact' => $contact->id]) }}')">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No result found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    const deleteContact = (url) => {
        Swal.fire({
            title: "Are you sure you want to delete?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url,
                    method: 'DELETE',
                    success: function(res) {
                        window.location.reload();
                    }
                });
            }
        });
    }

    $(document).ready(function() {
        $('.search-contact').click(function() {
            const search = $('input[name=search_contact]').val();

            $.ajax({
                url: '{{ route("contacts.index") }}?search=' + search,
                method: 'GET',
                success: function(res) {
                    $('#contact-results').html(res);
                }
            });
        });
    })
    </script>
@endsection
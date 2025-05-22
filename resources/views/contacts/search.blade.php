@forelse ($contacts as $contact)
    <tr id="contact-{{ $contact->id }}">
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->company }}</td>
        <td>{{ $contact->phone }}</td>
        <td>{{ $contact->email }}</td>
        <td>
            <a href="">Edit</a>
            <a href="javascript:void(0)" onclick="deleteContact('{{ route('contacts.destroy', ['contact' => $contact->id]) }}')">Delete</a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5">No result found.</td>
    </tr>
@endforelse

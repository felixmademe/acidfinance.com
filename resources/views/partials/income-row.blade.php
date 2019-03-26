
<tr id="incomeRow{{ $income->id }}">
    <td>{{ $income->name }}</td>
    <td>{{ $income->category->name ?? 'None' }}</td>
    <td>{{ $income->monthly == 1 ? 'Yes' : 'No' }}</td>
    <td class="green-text">{{ $income->amount }}kr</td>
    <td class="">
        <a href="{{ url( 'income/' . $income->id . '/edit') }}" class="blue-text">Edit </a>
         /
        <form method="post" action="/imcone/{{ $income->id }}" class="income-form">
            @csrf
            {{ method_field( 'delete' ) }}
            <input type="hidden" name="id" value="{{ $income->id }}">
            <button type="submit" name="submit" class="no-btn p-0">
                <a class="red-text">Remove</a>
            </button>
        </form>
    </td>
</tr>

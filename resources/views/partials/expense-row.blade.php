
<tr id="expenseRow{{ $expense->id }}">
    <td>{{ $expense->name }}</td>
    <td>{{ $expense->category->name ?? 'None' }}</td>
    <td>{{ $expense->monthly == 1 ? 'Yes' : 'No' }}</td>
    <td class="green-text">{{ $expense->amount }}kr</td>
    <td class="">
        <a href="{{ url( 'expense/' . $expense->id . '/edit') }}" class="blue-text">Edit </a>
         /
        <form method="post" action="/imcone/{{ $expense->id }}" class="expense-form">
            @csrf
            {{ method_field( 'delete' ) }}
            <input type="hidden" name="id" value="{{ $expense->id }}">
            <button type="submit" name="submit" class="no-btn p-0">
                <a class="red-text">Remove</a>
            </button>
        </form>
    </td>
</tr>

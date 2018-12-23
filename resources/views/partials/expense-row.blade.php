<tr id="expenseRow{{ $expense->id }}">
    <td>{{ $expense->name }}</td>
    <td>{{ $expense->category->name ?? 'None' }}</td>
    <td>
        @if( $expense->monthly == 1 )
            {{ 'Yes' }}
        @else
            {{ 'No' }}
        @endif
    </td>
    <td class="red-text">{{ $expense->amount }}kr</td>
    <td class="">
        <a href="{{ route( 'expense.edit.{id}', [ 'id' => $expense->id ] ) }}" class="blue-text">Edit </a>
         /
         {{-- action="{{ route( '$expense.destroy', [ 'destroy' => $expense->id ] ) }}" --}}
        <form class="expense-form">
            @csrf
            <input type="hidden" name="id" value="{{ $expense->id }}">
            <button type="submit" name="submit" class="no-btn p-0">
                <a class="red-text">Remove</a>
            </button>
        </form>
    </td>
</tr>

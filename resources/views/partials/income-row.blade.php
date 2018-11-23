<tr id="incomeRow{{ $income->id }}">
    <td>{{ $income->name }}</td>
    <td>{{ $income->category->name ?? 'None' }}</td>
    <td>
        @if( $income->monthly == 1 )
            {{ 'Yes' }}
        @else
            {{ 'No' }}
        @endif
    </td>
    <td class="green-text">{{ $income->amount }}kr</td>
    <td class="">
        <a href="{{ route( 'income.edit.{id}', [ 'id' => $income->id ] ) }}" class="blue-text">Edit </a>
         /
         {{-- action="{{ route( 'income.destroy', [ 'destroy' => $income->id ] ) }}" --}}
        <form class="income-form">
            @csrf
            <input type="hidden" name="id" value="{{ $income->id }}">
            <button type="submit" name="submit" class="no-btn p-0">
                <a class="red-text">Remove</a>
            </button>
        </form>
    </td>
</tr>

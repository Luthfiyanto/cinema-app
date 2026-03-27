@extends('layouts.app')

@section('style')
<style>
  table thead tbody {
    border: 1px solid;
  }
</style>
@endsection

@section('title', 'content')

@section('content')
<div class="grid grid-cols-2">
  <section class="p-2">
    <h1 class="font-bold text-blue-800 text-2xl my-5">Rental Movies Table</h1>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
      <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
          <th class="px-6 py-3 font-medium" scope="col">Rental ID</th>
          <th class="px-6 py-3 font-medium" scope="col">User</th>
          <th class="px-6 py-3 font-medium" scope="col">Address</th>
          <th class="px-6 py-3 font-medium" scope="col">Movie</th>
        </thead>
        <tbody>
          @foreach ($data['rent'] as $item)
          <tr class="bg-neutral-primary border-b border-default">
            <td class="px-6 py-4">{{ $item->id }}</td>
            <td class="px-6 py-4">{{ $item->user->salutation }} {{ $item->user->first_name }} {{ $item->user->last_name }}</td>
            <td class="px-6 py-4">{{ $item->user->address }}</td>
            <td class="px-6 py-4">{{ $item->movies->title }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>

  <section>
    <!-- <form action="" id="form-rent"> -->
    <label for="user-input">User</label>
    <select name="user-input" id="user-input" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
      @foreach ($data['users'] as $user)
      <option value="{{ $user->id }}">{{ $user->salutation }} {{ $user->first_name }} {{ $user->last_name }}</option>
      @endforeach
    </select>

    <label for="movie-input">Movie</label>
    <select name="movie-input" id="movie-input" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
      @foreach ($data['movies'] as $movie)
      <option value="{{ $movie->id }}">{{ $movie->title }}</option>
      @endforeach
    </select>

    <button type="button" id="submit-rent">Rent</button>
    <!-- </form> -->
  </section>
</div>
@endsection

@section('script')
<script>
  document.getElementById('submit-rent').addEventListener('click', (e) => {
    addRental()
  })

  function addRental() {
    const user_input = document.getElementById('user-input').value;
    const movie_input = document.getElementById('movie-input').value;

    const url = "{{ route('rent.store') }}";
    const options = {
      method: 'POST',
      body: JSON.stringify({
        user_id: user_input,
        movie_id: movie_input
      }),
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
      }
    }

    fetch(url, options).then(response.json())
      .then(
        window.location.href('/')
      ).catch(error => {
        console.log(error)
      })
  }
</script>
@endsection
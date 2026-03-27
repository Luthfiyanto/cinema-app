@extends('layouts.app')

@section('style')
<style>

</style>
@endsection

@section('title', 'content')

@section('content')
<div class="p-4">
  <h1 class="font-bold text-center">Rental Movies Table</h1>
  <section class="d-flex justify-content-center align-items-end">
    <div class="p-2">
      <label class="form-label font-bold" for="user-input">User</label>
      <select name="user-input" id="user-input" class="form-select" aria-label="Input User">
        <option value="" disabled>Pilih User yang telah terdaftar</option>
        @foreach ($data['users'] as $user)
        <option value="{{ $user->id }}">{{ $user->salutation }} {{ $user->first_name }} {{ $user->last_name }}</option>
        @endforeach
      </select>
    </div>
    <div class="p-2">
      <label class="form-label font-bold" for="movie-input">Movie</label>
      <select name="movie-input" id="movie-input" class="form-select" aria-label="Input Movie">
        <option value="" disabled>Pilih Movie yang tersedia</option>
        @foreach ($data['movies'] as $movie)
        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
        @endforeach
      </select>
    </div>

    <div class="p-2">
      <button class="btn btn-primary" type="button" id="submit-rent">Rent</button>
    </div>
    <!-- </form> -->
  </section>
  <section class="p-2">
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
      <table class="table">
        <thead class="table-info">
          <th scope="col">Rental ID</th>
          <th scope="col">User</th>
          <th scope="col">Address</th>
          <th scope="col">Movie</th>
        </thead>
        <tbody>
          @foreach ($data['rent'] as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->salutation }} {{ $item->user->first_name }} {{ $item->user->last_name }}</td>
            <td>{{ $item->user->address }}</td>
            <td>{{ $item->movies->title }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
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

    fetch(url, options)
      .then(response => response.json())
      .then((data) => {
        alert('Pemesanan Movie Berhasil');
        setTimeout(() => {
          window.location.reload()
        })
      }).catch(error => {
        console.log(error);
        alert('Pemesanan Movie Gagal');
      })
  }
</script>
@endsection
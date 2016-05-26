<table class="table table-sm">
  <thead>
    <tr>
      <th>id</th>
      <th>Short Name</th>
      <th>Slug</th>
      <th>Games</th>
    </tr>
  </thead>
  <tbody>
    @foreach(App\Platform::all() as $platform)
    <tr>
      <th scope="row">{{ $platform->id }}</th>
      <td>{{ $platform->name }}</td>
      <td>{{ $platform->slug }}</td>
      <td>{{ $platform->games()->count() }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
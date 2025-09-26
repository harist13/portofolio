@extends('admin.layout')

@section('title', 'Pengguna')

@section('content')
<!-- Pesan Sukses -->
@if (session('success'))
  <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
    {{ session('success') }}
  </div>
@endif

<!-- Pesan Error -->
@if ($errors->any())
  <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
    <ul class="list-disc ml-4">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="flex justify-between mb-4">
  <h1 class="text-2xl font-bold">Data Pengguna</h1>
  <button onclick="openAddModal()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">+ Tambah</button>
</div>

<div class="overflow-x-auto bg-white rounded-xl shadow">
  <table class="w-full text-left border-collapse">
    <thead class="bg-gray-200">
      <tr>
        <th class="p-3">No</th>
        <th class="p-3">Nama</th>
        <th class="p-3">Username</th>
        <th class="p-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($pengguna as $index => $user)
      <tr class="border-t">
        <td class="p-3">{{ $index + 1 }}</td>
        <td class="p-3">{{ $user->nama }}</td>
        <td class="p-3">{{ $user->username }}</td>
        <td class="p-3">
          <button onclick="openEditModal({{ $user->id }}, '{{ $user->nama }}', '{{ $user->username }}')" 
                  class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 mr-2">Edit</button>
          <button onclick="confirmDelete({{ $user->id }}, '{{ $user->nama }}')" 
                  class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
        </td>
      </tr>
      @empty
      <tr class="border-t">
        <td colspan="4" class="p-3 text-center text-gray-500">Tidak ada data pengguna</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Modal Tambah Pengguna -->
<div id="modalAddUser" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50" style="display: none;">
  <div class="bg-white p-6 rounded-xl w-96">
    <h2 class="text-xl font-bold mb-4">Tambah Pengguna</h2>
    <form action="{{ route('admin.pengguna.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
        <input type="text" name="nama" placeholder="Masukkan nama" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
        <input type="text" name="username" placeholder="Masukkan username" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" placeholder="Masukkan password" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeModal('modalAddUser')" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit Pengguna -->
<div id="modalEditUser" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50" style="display: none;">
  <div class="bg-white p-6 rounded-xl w-96">
    <h2 class="text-xl font-bold mb-4">Edit Pengguna</h2>
    <form id="formEditUser" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
        <input type="text" name="nama" id="editNama" placeholder="Masukkan nama" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
        <input type="text" name="username" id="editUsername" placeholder="Masukkan username" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password</small>
      </div>
      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeModal('modalEditUser')" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Update</button>
      </div>
    </form>
  </div>
</div>

<!-- Form Hapus Pengguna (Hidden) -->
<form id="formDeleteUser" method="POST" style="display: none;">
  @csrf
  @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
  function openAddModal() {
    const modal = document.getElementById('modalAddUser');
    modal.style.display = 'flex';
  }

  function openEditModal(id, nama, username) {
    document.getElementById('editNama').value = nama;
    document.getElementById('editUsername').value = username;
    document.getElementById('formEditUser').action = `/admin/pengguna/${id}`;
    const modal = document.getElementById('modalEditUser');
    modal.style.display = 'flex';
  }

  function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
  }

  function confirmDelete(id, nama) {
    if (confirm(`Apakah Anda yakin ingin menghapus pengguna "${nama}"?\n\nTindakan ini tidak dapat dibatalkan.`)) {
      const form = document.getElementById('formDeleteUser');
      form.action = `/admin/pengguna/${id}`;
      form.submit();
    }
  }

  // Close modal when clicking outside
  document.addEventListener('click', function(event) {
    if (event.target.id === 'modalAddUser' || event.target.id === 'modalEditUser') {
      event.target.style.display = 'none';
    }
  });

  // Close modal with Escape key
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      closeModal('modalAddUser');
      closeModal('modalEditUser');
    }
  });
</script>
@endpush

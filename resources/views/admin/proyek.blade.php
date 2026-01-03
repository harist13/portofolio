@extends('admin.layout')

@section('title', 'Proyek')

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
  <h1 class="text-2xl font-bold">Data Proyek</h1>
  <button onclick="openAddModal()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">+ Tambah</button>
</div>

<div class="overflow-x-auto bg-white rounded-xl shadow">
  <table class="w-full text-left border-collapse">
    <thead class="bg-gray-200">
      <tr>
        <th class="p-3">No</th>
        <th class="p-3">Nama</th>
        <th class="p-3">Gambar</th>
        <th class="p-3">Tech</th>
        <th class="p-3">Format</th>
        <th class="p-3">Deskripsi</th>
        <th class="p-3">Link</th>
        <th class="p-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($proyek as $index => $project)
      <tr class="border-t">
        <td class="p-3">{{ $index + 1 }}</td>
        <td class="p-3">{{ $project->nama }}</td>
        <td class="p-3">
          @if($project->gambar)
            <img src="{{ asset($project->gambar) }}" alt="{{ $project->nama }}" class="w-12 h-12 rounded object-cover">
          @else
            <div class="w-12 h-12 bg-gray-300 rounded flex items-center justify-center">
              <i class="fas fa-image text-gray-500"></i>
            </div>
          @endif
        </td>
        <td class="p-3">{{ $project->tech }}</td>
        <td class="p-3">
          @if(str_contains($project->deskripsi, '<ul>') || str_contains($project->deskripsi, '<li>'))
            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">List</span>
          @else
            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Paragraf</span>
          @endif
        </td>
        <td class="p-3">
          @if(str_contains($project->deskripsi, '<ul>') || str_contains($project->deskripsi, '<li>'))
            {!! Str::limit(strip_tags($project->deskripsi), 50) !!}
          @else
            {{ Str::limit($project->deskripsi, 50) }}
          @endif
        </td>
        <td class="p-3">
          <a href="{{ $project->link }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">Kunjungi</a>
        </td>
        <td class="p-3">
          <button onclick="openEditModal({{ $project->id }}, '{{ $project->nama }}', '{{ $project->tech }}', '{{ $project->deskripsi }}', '{{ $project->link }}')" 
                  class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 mr-2">Edit</button>
          <button onclick="confirmDelete({{ $project->id }}, '{{ $project->nama }}')" 
                  class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
        </td>
      </tr>
      @empty
      <tr class="border-t">
        <td colspan="8" class="p-3 text-center text-gray-500">Tidak ada data proyek</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Modal Tambah Proyek -->
<div id="modalAddProyek" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50" style="display: none;">
  <div class="bg-white p-6 rounded-xl w-96 max-h-90vh overflow-y-auto">
    <h2 class="text-xl font-bold mb-4">Tambah Proyek</h2>
    <form action="{{ route('admin.proyek.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Proyek</label>
        <input type="text" name="nama" placeholder="Masukkan nama proyek" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
        <input type="file" name="gambar" accept="image/*" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
        <small class="text-gray-500">Format: JPEG, PNG, JPG, GIF. Max: 2MB</small>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Teknologi</label>
        <input type="text" name="tech" placeholder="Contoh: Laravel, React, Vue" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Format Deskripsi</label>
        <select name="format_type" onchange="toggleDescriptionFormat(this.value, 'add')" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
          <option value="paragraph">Paragraf</option>
          <option value="list">List</option>
        </select>
        <small class="text-gray-500">Pilih format tampilan deskripsi</small>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
        <div id="add-paragraph-input">
          <textarea name="deskripsi" rows="4" placeholder="Deskripsi proyek (minimal 20 karakter)" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
          <small class="text-gray-500">Pisahkan paragraf dengan 2 baris kosong (Enter Enter)</small>
        </div>
        <div id="add-list-input" style="display: none;">
          <textarea name="deskripsi_list" rows="4" placeholder="- Item pertama&#10;- Item kedua&#10;- Item ketiga" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
          <small class="text-gray-500">Tulis setiap item dengan tanda dash (-) di awal baris baru</small>
        </div>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Link URL</label>
        <input type="url" name="link" placeholder="https://example.com" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeModal('modalAddProyek')" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit Proyek -->
<div id="modalEditProyek" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50" style="display: none;">
  <div class="bg-white p-6 rounded-xl w-96 max-h-90vh overflow-y-auto">
    <h2 class="text-xl font-bold mb-4">Edit Proyek</h2>
    <form id="formEditProyek" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Proyek</label>
        <input type="text" name="nama" id="editNama" placeholder="Masukkan nama proyek" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
        <input type="file" name="gambar" accept="image/*" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        <small class="text-gray-500">Kosongkan jika tidak ingin mengubah gambar. Format: JPEG, PNG, JPG, GIF. Max: 2MB</small>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Teknologi</label>
        <input type="text" name="tech" id="editTech" placeholder="Contoh: Laravel, React, Vue" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Format Deskripsi</label>
        <select name="format_type" id="editFormatType" onchange="toggleDescriptionFormat(this.value, 'edit')" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
          <option value="paragraph">Paragraf</option>
          <option value="list">List</option>
        </select>
        <small class="text-gray-500">Pilih format tampilan deskripsi</small>
      </div>
      <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
        <div id="edit-paragraph-input">
          <textarea name="deskripsi" id="editDeskripsi" rows="4" placeholder="Deskripsi proyek (minimal 20 karakter)" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
          <small class="text-gray-500">Pisahkan paragraf dengan 2 baris kosong (Enter Enter)</small>
        </div>
        <div id="edit-list-input" style="display: none;">
          <textarea name="deskripsi_list" id="editDeskripsiList" rows="4" placeholder="- Item pertama&#10;- Item kedua&#10;- Item ketiga" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
          <small class="text-gray-500">Tulis setiap item dengan tanda dash (-) di awal baris baru</small>
        </div>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Link URL</label>
        <input type="url" name="link" id="editLink" placeholder="https://example.com" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeModal('modalEditProyek')" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Update</button>
      </div>
    </form>
  </div>
</div>

<!-- Form Hapus Proyek (Hidden) -->
<form id="formDeleteProyek" method="POST" style="display: none;">
  @csrf
  @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
  function openAddModal() {
    const modal = document.getElementById('modalAddProyek');
    modal.style.display = 'flex';
  }

  function toggleDescriptionFormat(format, mode) {
    const paragraphInput = document.getElementById(`${mode}-paragraph-input`);
    const listInput = document.getElementById(`${mode}-list-input`);
    
    if (format === 'list') {
      paragraphInput.style.display = 'none';
      listInput.style.display = 'block';
      // Clear paragraph input and set required on list input
      if (mode === 'add') {
        document.querySelector(`#${mode}-paragraph-input textarea`).required = false;
        document.querySelector(`#${mode}-list-input textarea`).required = true;
      }
    } else {
      paragraphInput.style.display = 'block';
      listInput.style.display = 'none';
      // Clear list input and set required on paragraph input
      if (mode === 'add') {
        document.querySelector(`#${mode}-list-input textarea`).required = false;
        document.querySelector(`#${mode}-paragraph-input textarea`).required = true;
      }
    }
  }

  function openEditModal(id, nama, tech, deskripsi, link) {
    document.getElementById('editNama').value = nama;
    document.getElementById('editTech').value = tech;
    document.getElementById('editLink').value = link;
    
    // Auto-detect format type
    let formatType = 'paragraph';
    if (deskripsi.includes('<ul>') || deskripsi.includes('<li>')) {
      formatType = 'list';
    }
    
    // Set format type
    document.getElementById('editFormatType').value = formatType;
    toggleDescriptionFormat(formatType, 'edit');
    
    // Set description based on format
    if (formatType === 'list') {
      // Convert HTML list back to dash format for editing
      const listContent = deskripsi.replace(/<ul>/g, '').replace(/<\/ul>/g, '')
                                  .replace(/<li>/g, '- ').replace(/<\/li>/g, '\n')
                                  .trim();
      document.getElementById('editDeskripsiList').value = listContent;
      document.getElementById('editDeskripsi').value = deskripsi; // Keep original for fallback
    } else {
      document.getElementById('editDeskripsi').value = deskripsi;
    }
    
    document.getElementById('formEditProyek').action = `/admin/proyek/${id}`;
    const modal = document.getElementById('modalEditProyek');
    modal.style.display = 'flex';
  }

  function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
  }

  function confirmDelete(id, nama) {
    if (confirm(`Apakah Anda yakin ingin menghapus proyek "${nama}"?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus file gambar.`)) {
      const form = document.getElementById('formDeleteProyek');
      form.action = `/admin/proyek/${id}`;
      form.submit();
    }
  }

  // Close modal when clicking outside
  document.addEventListener('click', function(event) {
    if (event.target.id === 'modalAddProyek' || event.target.id === 'modalEditProyek') {
      event.target.style.display = 'none';
    }
  });

  // Close modal with Escape key
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      closeModal('modalAddProyek');
      closeModal('modalEditProyek');
    }
  });

  // Handle form submission for formatting
  document.addEventListener('DOMContentLoaded', function() {
    // Handle Add Form
    const addForm = document.querySelector('#modalAddProyek form');
    addForm.addEventListener('submit', function(e) {
      const formatType = document.querySelector('#modalAddProyek select[name="format_type"]').value;
      if (formatType === 'list') {
        const listText = document.querySelector('#modalAddProyek textarea[name="deskripsi_list"]').value;
        const paragraphTextarea = document.querySelector('#modalAddProyek textarea[name="deskripsi"]');
        paragraphTextarea.value = formatListToHtml(listText);
      }
    });

    // Handle Edit Form
    const editForm = document.querySelector('#modalEditProyek form');
    editForm.addEventListener('submit', function(e) {
      const formatType = document.querySelector('#modalEditProyek select[name="format_type"]').value;
      if (formatType === 'list') {
        const listText = document.querySelector('#modalEditProyek textarea[name="deskripsi_list"]').value;
        const paragraphTextarea = document.querySelector('#modalEditProyek textarea[name="deskripsi"]');
        paragraphTextarea.value = formatListToHtml(listText);
      }
    });
  });

  function formatListToHtml(listText) {
    // Convert list format to HTML
    const lines = listText.split('\n').filter(line => line.trim() !== '');
    const listItems = lines.map(line => {
      // Remove dash and trim
      const item = line.replace(/^-\s*/, '').trim();
      return item;
    }).filter(item => item !== '');
    
    return '<ul><li>' + listItems.join('</li><li>') + '</li></ul>';
  }

  function formatParagraphToHtml(paragraphText) {
    // Convert paragraphs (separated by double line breaks) to HTML
    const paragraphs = paragraphText.split('\n\n').filter(p => p.trim() !== '');
    return '<p>' + paragraphs.join('</p><p>') + '</p>';
  }
</script>
@endpush

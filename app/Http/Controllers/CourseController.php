public function edit(int $id)
{
    $course = Course::findOrFail($id);
    return view('courses.edit', compact('course'));
}

public function update(Request $request, int $id)
{
    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'nama'      => 'required|string|max:255',
        'deskripsi' => 'nullable|string|max:1000',
        'harga'     => 'required|integer|min:0',
        'kapasitas' => 'required|integer|min:1|max:500',
        'tanggal'   => 'required|date',
        'status'    => 'required|in:open,draft',
    ], [
        'nama.required'       => 'Nama kursus wajib diisi.',
        'harga.required'      => 'Biaya kursus wajib diisi.',
        'harga.min'           => 'Biaya kursus tidak boleh negatif.',
        'kapasitas.required'  => 'Kuota peserta wajib diisi.',
        'kapasitas.min'       => 'Kuota peserta minimal 1.',
        'kapasitas.max'       => 'Kuota peserta harus berada di antara 1 sampai 500 kursi.',
        'tanggal.required'    => 'Tanggal mulai wajib diisi.',
        'status.required'     => 'Status kursus wajib diisi.',
    ]);

    $course->update($validated);

    return redirect()->route('courses.show', $course->id)
        ->with('success', 'Kursus berhasil diperbarui!');
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Pengaduan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    // to allow format() date
    protected $dates = ['tgl_pengaduan'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('isi_laporan', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters["status"] ?? false, function ($query, $status) {
            return $query->where(function ($query) use ($status) {
                $query->where('status', $status);
            });
        });

        $query->when($filters["sort"] ?? false, function ($query, $sort) {
            return $query->orderBy('tgl_pengaduan', $sort);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_nik', 'nik');
    }

    public function tanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id', 'id_pengaduan');
    }
}

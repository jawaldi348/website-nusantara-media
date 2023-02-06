<?php
if (!function_exists('month')) {
    function month()
    {
        return array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    }
}

if (!function_exists('bulan')) {
    function bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

if (!function_exists('bln')) {
    function bln($idbln)
    {
        switch ($idbln) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Agu";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}

if (!function_exists('format_singkat')) {
    function format_singkat($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);  //memecah variabel berdasarkan -
        $tanggal = $pecah[2];
        $bulan = bln($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}

if (!function_exists('format_indo')) {
    function format_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}

if (!function_exists('format_en')) {
    function format_en($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = $pecah[1];
        $tahun = $pecah[0];
        return $bulan . '/' . $tanggal . '/' . $tahun;
    }
}

if (!function_exists('format_bulan')) {
    function format_bulan($tgl)
    {
        $ubah  = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $bulan . ' ' . $tahun;
    }
}

if (!function_exists('format_tahun')) {
    function format_tahun($tgl)
    {
        $ubah  = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tahun = $pecah[0];
        return $tahun;
    }
}

if (!function_exists('format_biasa')) {
    function format_biasa($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = $pecah[1];
        $tahun = $pecah[0];
        return $tanggal . '-' . $bulan . '-' . $tahun;
    }
}

if (!function_exists('format_timestamp')) {
    function format_timestamp($tgl, $jam = false)
    {
        $datetime = explode(" ", $tgl);
        $tanggal = $datetime[0];
        $waktu = $datetime[1];
        $explode_tanggal = explode("-", $tanggal);

        $tgl = $explode_tanggal[2];
        $bln = $explode_tanggal[1];
        $thn = $explode_tanggal[0];

        $datetime = [
            'date' => $thn . '-' . $bln . '-' . $tgl,
            'time' => $waktu
        ];
        return $datetime;
    }
}

if (!function_exists('format_tglen_timestamp')) {
    function format_tglen_timestamp($tgl)
    {
        // $inttime = date('Y-m-d H:i:s', $tgl);
        $tglBaru = explode(" ", $tgl);
        $tglBaru1 = $tglBaru[0];
        $tglBaru2 = $tglBaru[1];
        $tglBarua = explode("-", $tglBaru1);

        $tgl = $tglBarua[2];
        $bln = $tglBarua[1];
        $thn = $tglBarua[0];
        $ubahTanggal = $thn . '-' . $bln . '-' . $tgl;

        return $ubahTanggal;
    }
}

if (!function_exists('time_timestamp')) {
    function time_timestamp($time)
    {
        $value = substr($time, 0, -3);
        return $value;
    }
}

if (!function_exists('tanggal_indo_day')) {
    function tanggal_indo_day($tanggal, $cetak_hari = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split       = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo($timestamp)
    {
        if (!empty($timestamp)) {
            $timeDiff = time() - strtotime($timestamp);
            $seconds = $timeDiff;
            $minutes = round($seconds / 60);
            $hours = round($seconds / 3600);
            $days = round($seconds / 86400);
            $weeks = round($seconds / 604800);
            $months = round($seconds / 2629440);
            $years = round($seconds / 31553280);
            if ($seconds <= 60) {
                return 'Baru saja';
            } else if ($minutes <= 60) {
                if ($minutes == 1) {
                    return '1 menit yang lalu';
                } else {
                    return $minutes . ' menit yang lalu';
                }
            } else if ($hours <= 24) {
                if ($hours == 1) {
                    return '1 jam yang lalu';
                } else {
                    return $hours . ' jam yang lalu';
                }
            } else if ($days <= 30) {
                if ($days == 1) {
                    return '1 hari yang lalu';
                } else {
                    return $days . ' hari yang lalu';
                }
            } else if ($months <= 12) {
                if ($months == 1) {
                    return '1 bulan yang lalu';
                } else {
                    return $months . ' bulan yang lalu';
                }
            } else {
                if ($years == 1) {
                    return '1 tahun yang lalu';
                } else {
                    return $years . ' tahun yang lalu';
                }
            }
        }
    }
}

if (!function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array('y' => 'tahun', 'm' => 'bulan', 'w' => 'minggu', 'd' => 'hari', 'h' => 'jam', 'i' => 'menit', 's' => 'detik');
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                // $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                $v = $diff->$k . ' ' . $v;
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' yang lalu' : 'baru saja';
    }
}

<?php

class StaticVariable
{
    static $navbarPendeta = [
        [
            "isGroup" => true,
            "name" => "Home",
            "url" => "/pendeta",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga",
                    "url" => "/pendeta/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat",
                    "url" => "/pendeta/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Statistik",
                    "url" => "/pendeta/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Ulang Tahun",
                    "url" => "/pendeta/data/ultah",
                    "icon" => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>',
                ]
            ]
        ],
        
        [
            "isGroup" => true,
            "name" => "Kategorial Perminggu",
            "navbars" => [
                [
                    "name" => "Kategorial Jemaat",
                    "url" => "/pendeta/jemaatperminggupendeta",
                    "icon" => '<i class="fa fa-user" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Kategorial Perminggu",
                    "url" => "/pendeta/jemaatseminggupendeta",
                    "icon" => '<i class="fa fa-user" aria-hidden="true"></i>',
                ],
                 [
                    "name" => "Statistik Kategorial",
                    "url" => "/pendeta/statistik-kategorial",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Data Jemaat",
                    "url" => "/pendeta/data/dataperminggu/add",
                    "icon" => '<i class="fa fa-user-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
           [
            "isGroup" => true,
            "name" => "Administrasi Data",
            "navbars" => [
                [
                    "name" => "Lihat Data Administrasi",
                    "url" => "/pendeta/data/administrasi",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Administrasi",
                    "url" => "/pendeta/data/tambah-administrasi",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Keuangan Aktif",
                    "url" => "/pendeta/data/keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pemasukan",
                    "url" => "/pendeta/data/keuangan/cari-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pengeluaran",
                    "url" => "/pendeta/data/keuangan/cari-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Keuangan Statistik",
                    "url" => "/pendeta/data/keuangan/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
                [
                    "name" => "Laporan Keuangan",
                    "url" => "/pendeta/data/laporan-keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Mingguan",
                    "url" => "/pendeta/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Bulanan",
                    "url" => "/pendeta/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Tahunan",
                    "url" => "/pendeta/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Renungan Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Renungan",
                    "url" => "/pendeta/renungan",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Renungan",
                    "url" => "/pendeta/tambah-renungan",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
         [
            "isGroup" => true,
            "name" => "Jadwal Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Petugas Ibadah",
                    "url" => "/pendeta/jadwal",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Jadwal Ibadah",
                    "url" => "/pendeta/tambah-jadwal",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
         [
            "isGroup" => true,
            "name" => "Acara Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Acara Ibadah",
                    "url" => "/pendeta/acara",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Acara",
                    "url" => "/pendeta/tambah-acara",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Lihat Berita Gereja",
                    "url" => "/Beritapendeta",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Berita Gereja",
                    "url" => "/tambah-beritapendeta",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
            ],
            [
                "isGroup" => true,
                "name" => "Kegiatan Gereja",
                "navbars" => [
                    [
                        "name" => "Lihat Kegiatan",
                        "url" => "/pendeta/kegiatan",
                        "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                    ],
                    [
                        "name" => "Tambah Kegiatan",
                        "url" => "/pendeta/tambah-kegiatan",
                        "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                    ]
                ]
            ],
            [
            "isGroup" => true,
            "name" => "Tata Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Tata Ibadah",
                    "url" => "/pendeta/detail/ibadah",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Tata Ibadah",
                    "url" => "/pendeta/tambah-tata",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],

    ];
    
    static $user = null;
    static $navbarBendahara = [
        [
            "name" => "Home",
            "url" => "/bendahara",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Pemasukan",
            "navbars" => [
                [
                    "name" => "Pelean Minggu",
                    "url" => "/bendahara/data/peleanminggu",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Pelean Minggu",
                    "url" => "/bendahara/data/pemasukan/add",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ],[
                    "name" => "Pelean Kategorial",
                    "url" => "/bendahara/data/peleankategorial",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ], [
                    "name" => "Tambah Pelean Kategorial",
                    "url" => "/bendahara/data/kategorial/add",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ], 
                [
                    "name" => "Pelean Lainnya",
                    "url" => "/bendahara/data/peleanlain",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],[
                    "name" => "Tambah Pelean Lain-Lain",
                    "url" => "/bendahara/data/lain/add",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Bakti Keluarga",
                    "url" => "/bendahara/data/baktikeluarga",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ], [
                    "name" => "Tambah Bakti Jemaat",
                    "url" => "/bendahara/data/baktijemaat",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Data Penyewaan Gedung",
                    "url" => "/bendahara/data/lihatpenyewaangedung",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Penyewaan Gedung",
                    "url" => "/bendahara/data/sewagedung",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Data Ucapan Syukur",
                    "url" => "/bendahara/data/lihatucapansyukur",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Ucapan Syukur",
                    "url" => "/bendahara/data/ucapansyukurkeluarga",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Pengeluaran",
            "navbars" => [
                [
                    "name" => "Pengeluaran Gereja",
                    "url" => "/bendahara/data/pengeluarangereja",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Pengeluaran Gereja",
                    "url" => "/bendahara/data/pengeluarangereja/add",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Keuangan Aktif",
                    "url" => "/bendahara/data/keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Keuangan Non-Aktif",
                    "url" => "/bendahara/data/keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pemasukan",
                    "url" => "/bendahara/data/keuangan/cari-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pengeluaran",
                    "url" => "/bendahara/data/keuangan/cari-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Keuangan Statistik",
                    "url" => "/bendahara/data/keuangan/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
                [
                    "name" => "Laporan Keuangan",
                    "url" => "/bendahara/data/laporan-keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Non-Aktif",
                    "url" => "/bendahara/data/laporan-keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Mingguan",
                    "url" => "/bendahara/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Bulanan",
                    "url" => "/bendahara/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Tahunan",
                    "url" => "/bendahara/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];
    static $navbarPenatua = [
        [
            "name" => "Home",
            "url" => "/penatua",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Lihat Data Keluarga",
                    "url" => "/penatua/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Lihat Data Jemaat",
                    "url" => "/penatua/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Lihat Data Statistik",
                    "url" => "/penatua/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "lihat Dana Pemasukan",
                    "url" => "/penatua/data/keuangan/cari-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Dana Pengeluaran",
                    "url" => "/penatua/data/keuangan/cari-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Keuangan Statistik",
                    "url" => "/penatua/data/keuangan/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
                [
                    "name" => "Lihat Laporan Keuangan",
                    "url" => "/penatua/data/laporan-keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Laporan Keuangan Non-Aktif",
                    "url" => "/penatua/data/laporan-keuangan/nonaktif",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Keuangan Mingguan",
                    "url" => "/penatua/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Keuangan Bulanan",
                    "url" => "/penatua/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Lihat Keuangan Tahunan",
                    "url" => "/penatua/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Renungan Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Renungan",
                    "url" => "/penatua/renungan",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Renungan",
                    "url" => "/penatua/tambah-renungan",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Jadwal Ibadah",
            "navbars" => [
                [
                    "name" => "Lihat Jadwal Ibadah",
                    "url" => "/penatua/jadwal",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ]
            ]
        ],

    ];
    
    static $navbarJemaat = [
        [
            "name" => "Home",
            "url" => "/jemaat",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Lihat Data Keluarga",
                    "url" => "/jemaat/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
               [
                    "name" => "Lihat Data Statistik",
                    "url" => "/jemaat/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
         [
            "isGroup" => true,
            "name" => "Administrasi Data Jemaat",
            "navbars" => [
                [
                    "name" => "Lihat Data Administrasi",
                    "url" => "/jemaat/data/administrasi",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
            ]
            
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Dana Pemasukan",
                    "url" => "/jemaat/data/keuangan/cari-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pengeluaran",
                    "url" => "/jemaat/data/keuangan/cari-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Keuangan Statistik",
                    "url" => "/jemaat/data/keuangan/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
    ];
    static $navbarSekretaris = [
        [
            "name" => "Home",
            "url" => "/sekretaris",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga",
                    "url" => "/sekretaris/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat",
                    "url" => "/sekretaris/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Statistik",
                    "url" => "/sekretaris/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Ulang Tahun",
                    "url" => "/sekretaris/data/ultahsekretaris",
                    "icon" => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Keuangan Aktif",
                    "url" => "/sekretaris/data/keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pemasukan",
                    "url" => "/sekretaris/data/keuangan/cari-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pengeluaran",
                    "url" => "/sekretaris/data/keuangan/cari-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Keuangan Statistik",
                    "url" => "/sekretaris/data/keuangan/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
                [
                    "name" => "Laporan Keuangan",
                    "url" => "/sekretaris/data/laporan-keuangan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Mingguan",
                    "url" => "/sekretaris/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Bulanan",
                    "url" => "/sekretaris/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Tahunan",
                    "url" => "/sekretaris/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Lihat Berita Gereja",
                    "url" => "/Beritasekre",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Berita Gereja",
                    "url" => "/tambah-beritasekre",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];
    static $navbartatausaha = [
        [
            "name" => "Home",
            "url" => "/tatausaha",
            "icon" => '<i class="fa fa-home" aria-hidden="true"></i>',
            "isGroup" => false
        ],
        [
            "isGroup" => true,
            "name" => "Keluarga",
            "navbars" => [
                [
                    "name" => "Data Keluarga",
                    "url" => "/tatausaha/data/keluarga",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ]
            ]
        ],
        
        // Change Here...
        [
            "isGroup" => true,
            "name" => "Jemaat",
            "navbars" => [
                [
                    "name" => "Data Jemaat",
                    "url" => "/tatausaha/data/jemaat",
                    "icon" => '<i class="fa fa-users" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Statistik",
                    "url" => "/tatausaha/data/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ], [
                    "name" => "Data Ulang Tahun",
                    "url" => "/tatausaha/data/ultahtatausaha",
                    "icon" => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>',
                ]
            ]
        ],
         [
            "isGroup" => true,
            "name" => "Pengguna",
            "navbars" => [
                [
                    "name" => "Lihat Pengguna",
                    "url" => "/tatausaha/pelayangereja",
                    "icon" => '<i class="fa fa-user" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Pengguna",
                    "url" => "/tatausaha/data/pelayan/add",
                    "icon" => '<i class="fa fa-user-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Dana Keuangan",
            "navbars" => [
                [
                    "name" => "Dana Pemasukan",
                    "url" => "/tatausaha/data/keuangan/cari-pemasukan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Dana Pengeluaran",
                    "url" => "/tatausaha/data/keuangan/cari-pengeluaran",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Keuangan Statistik",
                    "url" => "/tatausaha/data/keuangan/statistik",
                    "icon" => '<i class="fa fa-line-chart" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Laporan Keuangan",
            "navbars" => [
            
                [
                    "name" => "Laporan Keuangan Mingguan",
                    "url" => "/tatausaha/data/laporan-keuangan/cari-mingguan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Bulanan",
                    "url" => "/tatausaha/data/laporan-keuangan/cari-bulanan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Laporan Keuangan Tahunan",
                    "url" => "/tatausaha/data/laporan-keuangan/cari-tahunan",
                    "icon" => '<i class="fa fa-money" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Kategorial Ibadah",
            "navbars" => [
                [
                    "name" => "Data Jemaat Beribadah",
                    "url" => "/tatausaha/jemaatperminggu",
                    "icon" => '<i class="fa fa-user" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Jemaat Beribadah",
                    "url" => "/tatausaha/data/dataperminggu/add",
                    "icon" => '<i class="fa fa-user-plus" aria-hidden="true"></i>',
                ]
            ]
        ],
        [
            "isGroup" => true,
            "name" => "Berita Gereja",
            "navbars" => [
                [
                    "name" => "Lihat Berita Gereja",
                    "url" => "/Berita",
                    "icon" => '<i class="fa fa-book" aria-hidden="true"></i>',
                ],
                [
                    "name" => "Tambah Berita Gereja",
                    "url" => "/tambah-berita",
                    "icon" => '<i class="fa fa-plus" aria-hidden="true"></i>',
                ]
            ]
        ]
    ];
}

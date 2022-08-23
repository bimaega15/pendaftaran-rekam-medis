<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>General</h3>
        <?=
        \yiister\gentelella\widgets\Menu::widget(
            [
                "items" => [
                    ["label" => "Home", "url" => "/", "icon" => "home"],
                    [
                        "label" => "Data master",
                        "icon" => "table",
                        "url" => "#",
                        "items" => [
                            ["label" => "Jenis layanan", "url" => ["/jenis-layanan"]],
                            ["label" => "Jenis registrasi", "url" => ["/jenis-registrasi"]],
                            ["label" => "Jenis pembayaran", "url" => ["/jenis-pembayaran"]],
                            ["label" => "Status registrasi", "url" => ["/status-registrasi"]],
                        ],
                    ],
                    ["label" => "Users", "url" => ["/users"], "icon" => "user-secret"],
                    ["label" => "Pasien", "url" => ["/pasien"], "icon" => "users"],
                    [
                        "label" => "Rekam medis",
                        "url" => "#",
                        "icon" => "table",
                        "items" => [
                            [
                                "label" => "Data rekam medis",
                                "url" => "/rekam-medis",
                            ],
                            [
                                "label" => "Laporan rekam medis",
                                "url" => "/laporan-rekam-medis",
                            ],
                        ],
                    ],
                ],
            ]
        )
        ?>
    </div>

</div>
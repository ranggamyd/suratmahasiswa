var editor = $("#summernote").summernote();

editor.summernote(
  "code",
  editor.summernote("code").replace("@no_surat", $("#no_surat").val())
);
// editor.summernote(
//   "code",
//   editor.summernote("code").replace("@nidn_dekan", $("#nidn_dekan").val())
// );
editor.summernote(
  "code",
  editor
    .summernote("code")
    .replace(
      "@nama_dekan",
      $("#nidn_dekan").find(":selected").data("nama_dekan")
    )
);
editor.summernote(
  "code",
  editor.summernote("code").replace("@ttd_nidn_dekan", $("#nidn_dekan").val())
);
editor.summernote(
  "code",
  editor
    .summernote("code")
    .replace(
      "@ttd_nama_dekan",
      $("#nidn_dekan").find(":selected").data("nama_dekan")
    )
);
editor.summernote(
  "code",
  editor.summernote("code").replace("@tahun_ajaran", $("#thn_ajaran").val())
);
var tgl_surat = $("#tgl_surat").val();

var tanggalArray = tgl_surat.split("-");
var tanggal = tanggalArray[2];
var bulan = new Date(tgl_surat).toLocaleString("id-ID", {
  month: "long",
});
var tahun = tanggalArray[0];

var tgl_suratFormatted = tanggal + " " + bulan + " " + tahun;

editor.summernote(
  "code",
  editor.summernote("code").replace("@tgl_surat", tgl_suratFormatted)
);

$("#no_surat").on("change", function () {
  editor.summernote(
    "code",
    editor.summernote("code").replace("@no_surat", $(this).val())
  );
});

$("#nim_mhs").on("change", function () {
  editor.summernote(
    "code",
    editor.summernote("code").replace("@nim_mhs", $(this).val())
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@nama_mhs", $(this).find(":selected").data("nama_mhs"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@tingkat", $(this).find(":selected").data("tingkat"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@semester", $(this).find(":selected").data("semester"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@nama_ortu", $(this).find(":selected").data("nama_ortu"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@nip", $(this).find(":selected").data("nip"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@pangkat", $(this).find(":selected").data("pangkat"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@golongan", $(this).find(":selected").data("golongan"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@tempat_kerja", $(this).find(":selected").data("tempat_kerja"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@alamat_rumah", $(this).find(":selected").data("alamat_rumah"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@nama_prodi", $(this).find(":selected").data("nama_prodi"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@gelar", $(this).find(":selected").data("gelar"))
  );
});

$("#nidn_dekan").on("change", function () {
  editor.summernote(
    "code",
    editor.summernote("code").replace("@nidn_dekan", $(this).val())
  );
  // editor.summernote(
  //   "code",
  //   editor
  //     .summernote("code")
  //     .replace("@nama_dekan", $(this).find(":selected").data("nama_dekan"))
  // );
  editor.summernote(
    "code",
    editor.summernote("code").replace("@ttd_nidn_dekan", $(this).val())
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@nttd_ama_dekan", $(this).find(":selected").data("nama_dekan"))
  );
});

// $("#tgl_lulus").on("change", function () {
//   var tgl_lulus = $(this).val();

//   var tanggalArray = tgl_lulus.split("-");
//   var tanggal = tanggalArray[2];
//   var bulan = new Date(tgl_lulus).toLocaleString("id-ID", {
//     month: "long",
//   });
//   var tahun = tanggalArray[0];

//   var tgl_lulusFormatted = tanggal + " " + bulan + " " + tahun;

//   editor.summernote(
//     "code",
//     editor.summernote("code").replace("@tgl_lulus", tgl_lulusFormatted)
//   );
// });

// $("#ipk").on("change", function () {
//   editor.summernote(
//     "code",
//     editor.summernote("code").replace("@ipk", $(this).val())
//   );
// });

$("#tgl_surat").on("change", function () {
  var tgl_surat = $(this).val();

  var tanggalArray = tgl_surat.split("-");
  var tanggal = tanggalArray[2];
  var bulan = new Date(tgl_surat).toLocaleString("id-ID", {
    month: "long",
  });
  var tahun = tanggalArray[0];

  var tgl_suratFormatted = tanggal + " " + bulan + " " + tahun;

  editor.summernote(
    "code",
    editor.summernote("code").replace("@tgl_surat", tgl_suratFormatted)
  );
});

// $("#keperluan").on("change", function () {
//   editor.summernote(
//     "code",
//     editor.summernote("code").replace("@keperluan", $(this).val())
//   );
// });

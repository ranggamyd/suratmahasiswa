var editor = $("#summernote").summernote();

editor.summernote(
  "code",
  editor.summernote("code").replace('@no_surat', $("#no_surat").val())
);
editor.summernote(
  "code",
  editor.summernote("code").replace("@perihal", $("#perihal").val())
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
      .replace("@semester", $(this).find(":selected").data("semester"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@nama_prodi_2", $(this).find(":selected").data("nama_prodi"))
  );
});

$("#nidn_kaprodi").on("change", function () {
  editor.summernote(
    "code",
    editor.summernote("code").replace("@nama_kaprodi", $(this).find(":selected").data("nama_kaprodi"))
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@nama_prodi", $(this).find(":selected").data("nama_prodi"))
  );
  editor.summernote(
    "code",
    editor.summernote("code").replace("@ttd_nidn_kaprodi", $(this).val())
  );
  editor.summernote(
    "code",
    editor
      .summernote("code")
      .replace("@ttd_nama_kaprodi", $(this).find(":selected").data("nama_kaprodi"))
  );
});

$("#tujuan").on("change", function () {
  editor.summernote(
    "code",
    editor.summernote("code").replace("@tujuan", $(this).val())
  );
});

$("#instansi").on("change", function () {
  editor.summernote(
    "code",
    editor.summernote("code").replace("@instansi", $(this).val())
  );
});

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

$("#perihal").on("change", function () {
  editor.summernote(
    "code",
    editor.summernote("code").replace("@perihal", $(this).val())
  );
});

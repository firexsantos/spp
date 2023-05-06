$(function() {
  'use strict';

  $('#myDropify').dropify({
      messages: {
          'default': 'Seret dan jatuhkan gambar atau klik di sini',
          'replace': 'Seret dan jatuhkan gambar atau klik untuk mengganti gambar',
          'remove': 'Hapus',
          'error': 'Ooops, terjadi kesalahan.'
      },
      'error': {
          'fileSize': 'Gambar terlalu besar, maksimal 1 MB'
      }
  });
});

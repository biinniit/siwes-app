<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->bigInteger('studentId');
            $table->bigInteger('roleId')->index('roleId');

            $table->unique(['studentId', 'roleId'], 'uniqueApplication');
        });

        Schema::create('branch', function (Blueprint $table) {
            $table->bigInteger('branchId', true);
            $table->bigInteger('companyId')->index('companyId');
            $table->string('name');
            $table->text('address');
            $table->bigInteger('phone')->nullable();
        });

        Schema::create('company', function (Blueprint $table) {
            $table->bigInteger('companyId', true);
            $table->string('name');
            $table->bigInteger('logoId')->nullable()->index('logoId');
            $table->text('website')->nullable();
        });

        Schema::create('company_image', function (Blueprint $table) {
            $table->bigInteger('imageId');
            $table->bigInteger('companyId')->index('companyId');

            $table->unique(['imageId', 'companyId'], 'uniqueCompanyImage');
        });

        Schema::create('file', function (Blueprint $table) {
            $table->bigInteger('fileId', true);
            $table->string('name', 100);
            $table->enum('mimeType', ['x-world/x-3dmf', 'video/3gpp2', 'video/3gpp', 'application/x-7z-compressed', 'application/octet-stream', 'application/x-authorware-bin', 'audio/aac', 'application/x-authorware-map', 'application/x-authorware-seg', 'text/vnd.abc', 'application/x-abiword', 'text/html', 'video/animaflex', 'application/postscript', 'audio/aiff', 'audio/x-aiff', 'application/x-aim', 'text/x-audiosoft-intra', 'application/x-navi-animation', 'application/x-nokia-9000-communicator-add-on-software', 'application/vnd.android.package-archive', 'application/mime', 'application/x-freearc', 'application/arj', 'image/x-jg', 'video/x-ms-asf', 'text/x-asm', 'text/asp', 'application/x-mplayer2', 'video/x-ms-asf-plugin', 'audio/basic', 'audio/x-au', 'application/x-troff-msvideo', 'video/avi', 'video/msvideo', 'video/x-msvideo', 'video/avs-video', 'application/vnd.amazon.ebook', 'application/x-bcpio', 'application/mac-binary', 'application/macbinary', 'application/x-binary', 'application/x-macbinary', 'image/bmp', 'image/x-windows-bmp', 'application/book', 'application/x-bzip2', 'application/x-bsh', 'application/x-bzip', 'text/plain', 'text/x-c', 'application/vnd.ms-pki.seccat', 'application/clariscad', 'application/x-cocoa', 'application/cdf', 'application/x-cdf', 'application/x-netcdf', 'application/pkix-cert', 'application/x-x509-ca-cert', 'application/x-chat', 'application/java', 'application/java-byte-code', 'application/x-java-class', 'application/x-cpio', 'application/mac-compactpro', 'application/x-compactpro', 'application/x-cpt', 'application/pkcs-crl', 'application/pkix-crl', 'application/x-x509-user-cert', 'application/x-csh', 'text/x-script.csh', 'application/x-pointplus', 'text/css', 'text/csv', 'application/x-director', 'application/x-deepv', 'video/x-dv', 'image/vnd.djvu', 'video/dl', 'video/x-dl', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/commonground', 'application/drafting', 'application/x-dvi', 'drawing/x-dwf (old)', 'model/vnd.dwf', 'application/acad', 'image/vnd.dwg', 'image/x-dwg', 'application/dxf', 'text/x-script.elisp', 'application/x-bytecode.elisp (compiled elisp)', 'application/x-elc', 'application/x-envoy', 'application/vnd.ms-fontobject', 'application/epub+zip', 'application/x-esrehber', 'text/x-setext', 'application/envoy', 'text/x-fortran', 'application/x-fictionbook', 'text/fb2', 'application/vnd.fdf', 'application/fractals', 'image/fif', 'video/fli', 'video/x-fli', 'image/florian', 'text/vnd.fmi.flexstor', 'video/x-atomic3d-feature', 'image/vnd.fpx', 'image/vnd.net-fpx', 'application/freeloader', 'audio/make', 'image/g3fax', 'image/gif', 'video/gl', 'video/x-gl', 'audio/x-gsm', 'application/x-gsp', 'application/x-gss', 'application/x-gtar', 'application/x-compressed', 'application/x-gzip', 'multipart/x-gzip', 'text/x-h', 'application/x-hdf', 'application/x-helpfile', 'application/vnd.hp-hpgl', 'text/x-script', 'application/hlp', 'application/x-winhelp', 'application/binhex', 'application/binhex4', 'application/mac-binhex', 'application/mac-binhex40', 'application/x-binhex40', 'application/x-mac-binhex40', 'application/hta', 'text/x-component', 'text/webviewhtml', 'x-conference/x-cooltalk', 'image/vnd.microsoft.icon', 'image/x-icon', 'text/calendar', 'image/ief', 'application/iges', 'model/iges', 'application/x-ima', 'application/x-httpd-imap', 'application/inf', 'application/x-internett-signup', 'application/x-ip2', 'video/x-isvideo', 'audio/it', 'application/x-inventor', 'i-world/i-vrml', 'application/x-livescreen', 'audio/x-jam', 'application/java-archive', 'text/x-java-source', 'application/x-java-commerce', 'image/jpeg', 'image/pjpeg', 'image/x-jps', 'application/ecmascript', 'application/javascript', 'application/x-javascript', 'text/ecmascript', 'text/javascript', 'application/json', 'application/ld+json', 'image/jutvision', 'audio/midi', 'music/x-karaoke', 'application/x-ksh', 'text/x-script.ksh', 'audio/nspaudio', 'audio/x-nspaudio', 'audio/x-liveaudio', 'application/x-latex', 'application/lha', 'application/x-lha', 'application/x-lisp', 'text/x-script.lisp', 'text/x-la-asf', 'application/x-lzh', 'application/lzx', 'application/x-lzx', 'text/x-m', 'video/mpeg', 'audio/mpeg', 'audio/x-mpequrl', 'application/x-troff-man', 'application/x-navimap', 'application/mbedlet', 'application/x-magic-cap-package-1.0', 'application/mcad', 'application/x-mathcad', 'image/vasa', 'text/mcf', 'application/netmc', 'application/x-troff-me', 'message/rfc822', 'application/x-midi', 'audio/x-mid', 'audio/x-midi', 'music/crescendo', 'x-music/x-midi', 'application/x-frame', 'application/x-mif', 'www/mime', 'audio/x-vnd.audioexplosion.mjuicemediafile', 'video/x-motion-jpeg', 'application/base64', 'application/x-meme', 'audio/mod', 'audio/x-mod', 'video/quicktime', 'video/x-sgi-movie', 'audio/x-mpeg', 'video/x-mpeg', 'video/x-mpeq2a', 'audio/mp3', 'video/mp4', 'application/x-project', 'application/vnd.apple.installer+xml', 'application/vnd.ms-project', 'application/marc', 'application/x-troff-ms', 'application/x-vnd.audioexplosion.mzz', 'image/naplps', 'application/vnd.nokia.configuration-message', 'image/x-niff', 'application/x-mix-transfer', 'application/x-conference', 'application/x-navidoc', 'application/oda', 'application/vnd.oasis.opendocument.presentation', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.oasis.opendocument.text', 'audio/ogg', 'video/ogg', 'application/ogg', 'application/x-omc', 'application/x-omcdatamaker', 'application/x-omcregerator', 'font/otf', 'text/x-pascal', 'application/pkcs10', 'application/x-pkcs10', 'application/pkcs-12', 'application/x-pkcs12', 'application/x-pkcs7-signature', 'application/pkcs7-mime', 'application/x-pkcs7-mime', 'application/x-pkcs7-certreqresp', 'application/pkcs7-signature', 'application/pro_eng', 'text/pascal', 'image/x-portable-bitmap', 'application/vnd.hp-pcl', 'application/x-pcl', 'image/x-pict', 'image/x-pcx', 'chemical/x-pdb', 'application/pdf', 'audio/make.my.funk', 'image/x-portable-graymap', 'image/x-portable-greymap', 'image/pict', 'application/x-newton-compatible-pkg', 'application/vnd.ms-pki.pko', 'text/x-script.perl', 'application/x-pixclscript', 'image/x-xpixmap', 'text/x-script.perl-module', 'application/x-pagemaker', 'image/png', 'application/x-portable-anymap', 'image/x-portable-anymap', 'application/mspowerpoint', 'application/vnd.ms-powerpoint', 'model/x-pov', 'image/x-portable-pixmap', 'application/powerpoint', 'application/x-mspowerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/x-freelance', 'paleovu/x-pv', 'text/x-script.phyton', 'applicaiton/x-bytecode.python', 'audio/vnd.qcelp', 'image/x-quicktime', 'video/x-qtc', 'audio/x-pn-realaudio', 'audio/x-pn-realaudio-plugin', 'audio/x-realaudio', 'application/x-rar-compressed', 'application/x-cmu-raster', 'image/cmu-raster', 'image/x-cmu-raster', 'text/x-script.rexx', 'image/vnd.rn-realflash', 'image/x-rgb', 'application/vnd.rn-realmedia', 'audio/mid', 'application/ringing-tones', 'application/vnd.nokia.ringing-tone', 'application/vnd.rn-realplayer', 'application/x-troff', 'image/vnd.rn-realpix', 'text/richtext', 'text/vnd.rn-realtext', 'application/rtf', 'application/x-rtf', 'video/vnd.rn-realvideo', 'audio/s3m', 'application/x-tbook', 'application/x-lotusscreencam', 'text/x-script.guile', 'text/x-script.scheme', 'video/x-scm', 'application/sdp', 'application/x-sdp', 'application/sounder', 'application/sea', 'application/x-sea', 'application/set', 'text/sgml', 'text/x-sgml', 'application/x-sh', 'application/x-shar', 'text/x-script.sh', 'text/x-server-parsed-html', 'audio/x-psid', 'application/x-sit', 'application/x-stuffit', 'application/x-koan', 'application/x-seelogo', 'application/smil', 'audio/x-adpcm', 'application/solids', 'application/x-pkcs7-certificates', 'text/x-speech', 'application/futuresplash', 'application/x-sprite', 'application/x-wais-source', 'application/streamingmedia', 'application/vnd.ms-pki.certstore', 'application/step', 'application/sla', 'application/vnd.ms-pki.stl', 'application/x-navistyle', 'application/x-sv4cpio', 'application/x-sv4crc', 'image/svg+xml', 'application/x-world', 'x-world/x-svr', 'application/x-shockwave-flash', 'application/x-tar', 'application/toolbook', 'application/x-tcl', 'text/x-script.tcl', 'text/x-script.tcsh', 'application/x-tex', 'application/x-texinfo', 'application/plain', 'application/gnutar', 'image/tiff', 'image/x-tiff', 'video/mp2t', 'audio/tsp-audio', 'application/dsptype', 'audio/tsplayer', 'text/tab-separated-values', 'font/ttf', 'text/x-uil', 'text/uri-list', 'application/i-deas', 'application/x-ustar', 'multipart/x-ustar', 'text/x-uuencode', 'application/x-cdlink', 'text/x-vcalendar', 'application/vda', 'video/vdo', 'application/groupwise', 'video/vivo', 'video/vnd.vivo', 'application/vocaltec-media-desc', 'application/vocaltec-media-file', 'audio/voc', 'audio/x-voc', 'video/vosaic', 'audio/voxware', 'audio/x-twinvq-plugin', 'audio/x-twinvq', 'application/x-vrml', 'model/vrml', 'x-world/x-vrml', 'x-world/x-vrt', 'application/vnd.visio', 'application/x-visio', 'application/wordperfect6.0', 'application/wordperfect6.1', 'audio/wav', 'audio/x-wav', 'application/x-qpro', 'image/vnd.wap.wbmp', 'application/vnd.xara', 'audio/webm', 'video/webm', 'image/webp', 'application/x-123', 'windows/metafile', 'text/vnd.wap.wml', 'application/vnd.wap.wmlc', 'text/vnd.wap.wmlscript', 'application/vnd.wap.wmlscriptc', 'font/woff', 'font/woff2', 'application/wordperfect', 'application/x-wpwin', 'application/x-lotus', 'application/mswrite', 'application/x-wri', 'text/scriplet', 'application/x-wintalk', 'image/x-xbitmap', 'image/x-xbm', 'image/xbm', 'video/x-amt-demorun', 'xgl/drawing', 'application/xhtml+xml', 'image/vnd.xiff', 'application/excel', 'application/x-excel', 'application/x-msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'audio/xm', 'application/xml', 'text/xml', 'xgl/movie', 'application/x-vnd.ls-xpix', 'image/xpm', 'video/x-amt-showrun', 'application/vnd.mozilla.xul+xml', 'image/x-xwd', 'image/x-xwindowdump', 'application/x-compress', 'application/zip', 'text/x-script.zsh']);
            $table->binary('content');
        });

        Schema::create('program', function (Blueprint $table) {
            $table->bigInteger('programId', true);
            $table->string('title');
        });

        Schema::create('role', function (Blueprint $table) {
            $table->bigInteger('roleId', true);
            $table->bigInteger('branchId')->index('branchId');
            $table->string('title');
            $table->decimal('remuneration', 10)->nullable();
            $table->enum('remunerationCycle', ['PER TASK', 'HOURLY', 'DAILY', 'WEEKLY', 'BI-WEEKLY', 'SEMI-MONTHLY', 'MONTHLY', 'YEARLY'])->nullable();
            $table->smallInteger('slots')->default(1);
        });

        Schema::create('role_tag', function (Blueprint $table) {
            $table->bigInteger('tagId');
            $table->bigInteger('roleId')->index('roleId');

            $table->unique(['tagId', 'roleId'], 'uniqueRoleTag');
        });

        Schema::create('student', function (Blueprint $table) {
            $table->bigInteger('studentId', true);
            $table->string('firstName', 100);
            $table->string('middleName', 100)->nullable();
            $table->string('lastName', 100);
            $table->string('email')->unique('email');
            $table->char('passwordHash', 32);
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('programId')->index('programId');
            $table->text('address')->nullable();
            $table->bigInteger('profilePictureId')->index('profilePictureId');
            $table->bigInteger('resumeId')->nullable()->index('resumeId');
        });

        Schema::create('tag', function (Blueprint $table) {
            $table->bigInteger('tagId', true);
            $table->string('name');
        });

        Schema::table('application', function (Blueprint $table) {
            $table->foreign(['roleId'], 'application_ibfk_2')->references(['roleId'])->on('role')->onDelete('CASCADE');
            $table->foreign(['studentId'], 'application_ibfk_1')->references(['studentId'])->on('student')->onDelete('CASCADE');
        });

        Schema::table('branch', function (Blueprint $table) {
            $table->foreign(['companyId'], 'branch_ibfk_1')->references(['companyId'])->on('company')->onDelete('CASCADE');
        });

        Schema::table('company', function (Blueprint $table) {
            $table->foreign(['logoId'], 'company_ibfk_1')->references(['fileId'])->on('file')->onDelete('SET NULL');
        });

        Schema::table('company_image', function (Blueprint $table) {
            $table->foreign(['companyId'], 'company_image_ibfk_2')->references(['companyId'])->on('company')->onDelete('CASCADE');
            $table->foreign(['imageId'], 'company_image_ibfk_1')->references(['fileId'])->on('file')->onDelete('CASCADE');
        });

        Schema::table('role', function (Blueprint $table) {
            $table->foreign(['branchId'], 'role_ibfk_1')->references(['branchId'])->on('branch')->onDelete('CASCADE');
        });

        Schema::table('role_tag', function (Blueprint $table) {
            $table->foreign(['roleId'], 'role_tag_ibfk_2')->references(['roleId'])->on('role')->onDelete('CASCADE');
            $table->foreign(['tagId'], 'role_tag_ibfk_1')->references(['tagId'])->on('tag')->onDelete('CASCADE');
        });

        Schema::table('student', function (Blueprint $table) {
            $table->foreign(['profilePictureId'], 'student_ibfk_2')->references(['fileId'])->on('file');
            $table->foreign(['programId'], 'student_ibfk_1')->references(['programId'])->on('program');
            $table->foreign(['resumeId'], 'student_ibfk_4')->references(['fileId'])->on('file')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student', function (Blueprint $table) {
            $table->dropForeign('student_ibfk_2');
            $table->dropForeign('student_ibfk_1');
            $table->dropForeign('student_ibfk_4');
        });

        Schema::table('role_tag', function (Blueprint $table) {
            $table->dropForeign('role_tag_ibfk_2');
            $table->dropForeign('role_tag_ibfk_1');
        });

        Schema::table('role', function (Blueprint $table) {
            $table->dropForeign('role_ibfk_1');
        });

        Schema::table('company_image', function (Blueprint $table) {
            $table->dropForeign('company_image_ibfk_2');
            $table->dropForeign('company_image_ibfk_1');
        });

        Schema::table('company', function (Blueprint $table) {
            $table->dropForeign('company_ibfk_1');
        });

        Schema::table('branch', function (Blueprint $table) {
            $table->dropForeign('branch_ibfk_1');
        });

        Schema::table('application', function (Blueprint $table) {
            $table->dropForeign('application_ibfk_2');
            $table->dropForeign('application_ibfk_1');
        });

        Schema::dropIfExists('tag');

        Schema::dropIfExists('student');

        Schema::dropIfExists('role_tag');

        Schema::dropIfExists('role');

        Schema::dropIfExists('program');

        Schema::dropIfExists('file');

        Schema::dropIfExists('company_image');

        Schema::dropIfExists('company');

        Schema::dropIfExists('branch');

        Schema::dropIfExists('application');
    }
};

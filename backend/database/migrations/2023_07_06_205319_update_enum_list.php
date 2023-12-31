<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Doctrine\DBAL doesn't support SQL enums
        DB::statement('ALTER TABLE file MODIFY mimeType ENUM(
            \'application/vnd.lotus-1-2-3\',
            \'text/vnd.in3d.3dml\',
            \'video/3gpp2\',
            \'image/avif\',
            \'application/x-krita\',
            \'image/heic\',
            \'video/3gpp\',
            \'audio/3gpp2\',
            \'audio/3gpp\',
            \'application/x-7z-compressed\',
            \'application/octet-stream\',
            \'application/x-authorware-bin\',
            \'audio/x-aac\',
            \'application/x-authorware-map\',
            \'application/x-authorware-seg\',
            \'application/x-abiword\',
            \'application/vnd.americandynamics.acc\',
            \'application/x-ace-compressed\',
            \'application/vnd.acucobol\',
            \'application/vnd.acucorp\',
            \'audio/adpcm\',
            \'application/vnd.audiograph\',
            \'application/x-font-type1\',
            \'application/vnd.ibm.modcap\',
            \'application/postscript\',
            \'audio/x-aiff\',
            \'application/vnd.adobe.air-application-installer-package+zip\',
            \'application/vnd.amiga.ami\',
            \'application/vnd.android.package-archive\',
            \'application/x-ms-application\',
            \'application/vnd.lotus-approach\',
            \'application/pgp-signature\',
            \'video/x-ms-asf\',
            \'text/x-asm\',
            \'application/vnd.accpac.simply.aso\',
            \'application/atom+xml\',
            \'application/atomcat+xml\',
            \'application/atomsvc+xml\',
            \'application/vnd.antix.game-component\',
            \'audio/basic\',
            \'video/x-msvideo\',
            \'application/applixware\',
            \'application/vnd.airzip.filesecure.azf\',
            \'application/vnd.airzip.filesecure.azs\',
            \'application/vnd.amazon.ebook\',
            \'application/x-msdownload\',
            \'application/x-bcpio\',
            \'application/x-font-bdf\',
            \'application/vnd.syncml.dm+wbxml\',
            \'application/vnd.fujitsu.oasysprs\',
            \'application/vnd.bmi\',
            \'image/bmp\',
            \'application/vnd.framemaker\',
            \'application/vnd.previewsystems.box\',
            \'application/x-bzip2\',
            \'image/prs.btif\',
            \'application/x-bzip\',
            \'text/x-c\',
            \'application/vnd.clonk.c4group\',
            \'application/vnd.ms-cab-compressed\',
            \'application/vnd.curl.car\',
            \'application/vnd.ms-pki.seccat\',
            \'application/x-director\',
            \'application/ccxml+xml\',
            \'application/vnd.contact.cmsg\',
            \'application/x-netcdf\',
            \'application/vnd.mediastation.cdkey\',
            \'chemical/x-cdx\',
            \'application/vnd.chemdraw+xml\',
            \'application/vnd.cinderella\',
            \'application/pkix-cert\',
            \'image/cgm\',
            \'application/x-chat\',
            \'application/vnd.ms-htmlhelp\',
            \'application/vnd.kde.kchart\',
            \'chemical/x-cif\',
            \'application/vnd.anser-web-certificate-issue-initiation\',
            \'application/vnd.ms-artgalry\',
            \'application/vnd.claymore\',
            \'application/java-vm\',
            \'application/vnd.crick.clicker.keyboard\',
            \'application/vnd.crick.clicker.palette\',
            \'application/vnd.crick.clicker.template\',
            \'application/vnd.crick.clicker.wordbank\',
            \'application/vnd.crick.clicker\',
            \'application/x-msclip\',
            \'application/vnd.cosmocaller\',
            \'chemical/x-cmdf\',
            \'chemical/x-cml\',
            \'application/vnd.yellowriver-custom-menu\',
            \'image/x-cmx\',
            \'application/vnd.rim.cod\',
            \'text/plain\',
            \'application/vnd.debian.binary-package\',
            \'text/markdown\',
            \'text/x-markdown\',
            \'application/x-cpio\',
            \'application/mac-compactpro\',
            \'application/x-mscardfile\',
            \'application/pkix-crl\',
            \'application/x-x509-ca-cert\',
            \'application/x-csh\',
            \'chemical/x-csml\',
            \'application/vnd.commonspace\',
            \'text/css\',
            \'text/csv\',
            \'application/cu-seeme\',
            \'text/vnd.curl\',
            \'application/prs.cww\',
            \'application/vnd.mobius.daf\',
            \'application/vnd.fdsn.seed\',
            \'application/davmount+xml\',
            \'text/vnd.curl.dcurl\',
            \'application/vnd.oma.dd2+xml\',
            \'application/vnd.fujixerox.ddd\',
            \'application/x-debian-package\',
            \'application/vnd.dreamfactory\',
            \'application/vnd.mobius.dis\',
            \'image/vnd.djvu\',
            \'application/vnd.dna\',
            \'application/msword\',
            \'application/vnd.ms-word.document.macroenabled.12\',
            \'application/vnd.openxmlformats-officedocument.wordprocessingml.document\',
            \'application/vnd.ms-word.template.macroenabled.12\',
            \'application/vnd.openxmlformats-officedocument.wordprocessingml.template\',
            \'application/vnd.osgi.dp\',
            \'application/vnd.dpgraph\',
            \'text/prs.lines.tag\',
            \'application/x-dtbook+xml\',
            \'application/xml-dtd\',
            \'audio/vnd.dts\',
            \'audio/vnd.dts.hd\',
            \'application/x-dvi\',
            \'model/vnd.dwf\',
            \'image/vnd.dwg\',
            \'image/vnd.dxf\',
            \'application/vnd.spotfire.dxp\',
            \'audio/vnd.nuera.ecelp4800\',
            \'audio/vnd.nuera.ecelp7470\',
            \'audio/vnd.nuera.ecelp9600\',
            \'application/ecmascript\',
            \'application/vnd.novadigm.edm\',
            \'application/vnd.novadigm.edx\',
            \'application/vnd.picsel\',
            \'application/vnd.pg.osasli\',
            \'message/rfc822\',
            \'application/emma+xml\',
            \'audio/vnd.digital-winds\',
            \'application/vnd.ms-fontobject\',
            \'application/epub+zip\',
            \'application/vnd.eszigno3+xml\',
            \'application/vnd.epson.esf\',
            \'text/x-setext\',
            \'application/vnd.novadigm.ext\',
            \'application/andrew-inset\',
            \'application/vnd.ezpix-album\',
            \'application/vnd.ezpix-package\',
            \'text/x-fortran\',
            \'video/x-f4v\',
            \'image/vnd.fastbidsheet\',
            \'application/vnd.fdf\',
            \'application/vnd.denovo.fcselayout-link\',
            \'application/vnd.fujitsu.oasysgp\',
            \'image/x-freehand\',
            \'application/x-xfig\',
            \'video/x-fli\',
            \'application/vnd.micrografx.flo\',
            \'video/x-flv\',
            \'application/vnd.kde.kivio\',
            \'text/vnd.fmi.flexstor\',
            \'text/vnd.fly\',
            \'application/vnd.frogans.fnc\',
            \'image/vnd.fpx\',
            \'application/vnd.fsc.weblaunch\',
            \'image/vnd.fst\',
            \'application/vnd.fluxtime.clip\',
            \'application/vnd.anser-web-funds-transfer-initiation\',
            \'video/vnd.fvt\',
            \'application/vnd.fuzzysheet\',
            \'image/g3fax\',
            \'application/vnd.groove-account\',
            \'model/vnd.gdl\',
            \'application/vnd.dynageo\',
            \'application/vnd.geometry-explorer\',
            \'application/vnd.geogebra.file\',
            \'application/vnd.geogebra.tool\',
            \'application/vnd.groove-help\',
            \'image/gif\',
            \'application/vnd.groove-identity-message\',
            \'application/vnd.gmx\',
            \'application/x-gnumeric\',
            \'application/vnd.flographit\',
            \'application/vnd.grafeq\',
            \'application/srgs\',
            \'application/vnd.groove-injector\',
            \'application/srgs+xml\',
            \'application/x-font-ghostscript\',
            \'application/x-gtar\',
            \'application/vnd.groove-tool-message\',
            \'model/vnd.gtw\',
            \'text/vnd.graphviz\',
            \'application/x-gzip\',
            \'application/gzip\',
            \'video/h261\',
            \'gcode\',
            \'video/h263\',
            \'video/h264\',
            \'application/vnd.hbci\',
            \'application/x-hdf\',
            \'application/winhlp\',
            \'application/vnd.hp-hpgl\',
            \'application/vnd.hp-hpid\',
            \'application/vnd.hp-hps\',
            \'application/mac-binhex40\',
            \'application/vnd.kenameaapp\',
            \'text/html\',
            \'application/vnd.yamaha.hv-dic\',
            \'application/vnd.yamaha.hv-voice\',
            \'application/vnd.yamaha.hv-script\',
            \'application/vnd.iccprofile\',
            \'x-conference/x-cooltalk\',
            \'image/x-icon\',
            \'text/calendar\',
            \'image/ief\',
            \'application/vnd.shana.informed.formdata\',
            \'model/iges\',
            \'application/vnd.igloader\',
            \'application/vnd.micrografx.igx\',
            \'application/vnd.shana.informed.interchange\',
            \'application/vnd.accpac.simply.imp\',
            \'application/vnd.ms-ims\',
            \'application/vnd.shana.informed.package\',
            \'application/vnd.ibm.rights-management\',
            \'application/vnd.irepository.package+xml\',
            \'application/vnd.shana.informed.formtemplate\',
            \'application/vnd.immervision-ivp\',
            \'application/vnd.immervision-ivu\',
            \'text/vnd.sun.j2me.app-descriptor\',
            \'application/vnd.jam\',
            \'application/java-archive\',
            \'text/x-java-source\',
            \'application/vnd.jisp\',
            \'application/vnd.hp-jlyt\',
            \'application/x-java-jnlp-file\',
            \'application/vnd.joost.joda-archive\',
            \'image/jpeg\',
            \'image/pjpeg\',
            \'video/jpm\',
            \'video/jpeg\',
            \'application/x-trash\',
            \'application/x-shellscript\',
            \'text/javascript\',
            \'application/json\',
            \'text/json\',
            \'audio/midi\',
            \'audio/aiff\',
            \'audio/opus\',
            \'application/vnd.kde.karbon\',
            \'application/vnd.kde.kformula\',
            \'application/vnd.kidspiration\',
            \'application/x-killustrator\',
            \'application/vnd.google-earth.kml+xml\',
            \'application/vnd.google-earth.kmz\',
            \'application/vnd.kinar\',
            \'application/vnd.kde.kontour\',
            \'application/vnd.kde.kpresenter\',
            \'application/vnd.kde.kspread\',
            \'application/vnd.kahootz\',
            \'application/vnd.kde.kword\',
            \'application/x-latex\',
            \'application/vnd.llamagraphics.life-balance.desktop\',
            \'application/vnd.llamagraphics.life-balance.exchange+xml\',
            \'application/vnd.hhe.lesson-player\',
            \'application/vnd.route66.link66+xml\',
            \'application/lost+xml\',
            \'application/vnd.ms-lrm\',
            \'application/vnd.frogans.ltf\',
            \'audio/vnd.lucent.voice\',
            \'application/vnd.lotus-wordpro\',
            \'application/x-msmediaview\',
            \'video/mpeg\',
            \'audio/mpeg\',
            \'audio/x-mpegurl\',
            \'video/vnd.mpegurl\',
            \'video/x-m4v\',
            \'application/mathematica\',
            \'application/vnd.ecowin.chart\',
            \'text/troff\',
            \'application/mathml+xml\',
            \'text/mathml\',
            \'application/vnd.sqlite3\',
            \'application/x-sqlite3\',
            \'application/vnd.mobius.mbk\',
            \'application/mbox\',
            \'application/vnd.medcalcdata\',
            \'application/vnd.mcd\',
            \'text/vnd.curl.mcurl\',
            \'application/x-msaccess\',
            \'image/vnd.ms-modi\',
            \'model/mesh\',
            \'application/vnd.mfmp\',
            \'application/vnd.proteus.magazine\',
            \'application/vnd.mif\',
            \'video/mj2\',
            \'application/vnd.dolby.mlp\',
            \'application/vnd.chipnuts.karaoke-mmd\',
            \'application/vnd.smaf\',
            \'image/vnd.fujixerox.edmics-mmr\',
            \'application/x-msmoney\',
            \'application/x-mobipocket-ebook\',
            \'video/quicktime\',
            \'video/x-sgi-movie\',
            \'video/mp4\',
            \'audio/mp4\',
            \'application/mp4\',
            \'application/vnd.mophun.certificate\',
            \'application/vnd.apple.installer+xml\',
            \'application/vnd.blueice.multipass\',
            \'application/vnd.mophun.application\',
            \'application/vnd.ms-project\',
            \'application/vnd.ibm.minipay\',
            \'application/vnd.mobius.mqy\',
            \'application/marc\',
            \'application/mediaservercontrol+xml\',
            \'application/vnd.fdsn.mseed\',
            \'application/vnd.mseq\',
            \'application/vnd.epson.msf\',
            \'application/vnd.mobius.msl\',
            \'application/vnd.muvee.style\',
            \'model/vnd.mts\',
            \'application/vnd.musician\',
            \'application/vnd.recordare.musicxml+xml\',
            \'application/vnd.mfer\',
            \'application/mxf\',
            \'application/vnd.recordare.musicxml\',
            \'application/xv+xml\',
            \'application/vnd.triscape.mxs\',
            \'application/vnd.nokia.n-gage.symbian.install\',
            \'application/x-dtbncx+xml\',
            \'application/vnd.nokia.n-gage.data\',
            \'application/vnd.neurolanguage.nlu\',
            \'application/vnd.enliven\',
            \'application/vnd.noblenet-directory\',
            \'application/vnd.noblenet-sealer\',
            \'application/vnd.noblenet-web\',
            \'image/vnd.net-fpx\',
            \'application/vnd.lotus-notes\',
            \'application/vnd.fujitsu.oasys2\',
            \'application/vnd.fujitsu.oasys3\',
            \'application/vnd.fujitsu.oasys\',
            \'application/x-msbinder\',
            \'application/oda\',
            \'application/vnd.oasis.opendocument.database\',
            \'application/vnd.oasis.opendocument.chart\',
            \'application/vnd.oasis.opendocument.formula\',
            \'application/vnd.oasis.opendocument.formula-template\',
            \'application/vnd.oasis.opendocument.graphics\',
            \'application/vnd.oasis.opendocument.image\',
            \'application/vnd.oasis.opendocument.presentation\',
            \'application/vnd.oasis.opendocument.spreadsheet\',
            \'application/vnd.oasis.opendocument.text\',
            \'audio/ogg\',
            \'video/x-matroska\',
            \'audio/x-matroska\',
            \'video/ogg\',
            \'application/ogg\',
            \'application/onenote\',
            \'application/oebps-package+xml\',
            \'application/vnd.palm\',
            \'application/vnd.lotus-organizer\',
            \'application/vnd.yamaha.openscoreformat\',
            \'application/vnd.yamaha.openscoreformat.osfpvg+xml\',
            \'application/vnd.oasis.opendocument.chart-template\',
            \'font/woff\',
            \'font/woff2\',
            \'application/x-redhat-package-manager\',
            \'application/x-perl\',
            \'audio/webm\',
            \'video/webm\',
            \'image/webp\',
            \'application/x-font-otf\',
            \'font/otf\',
            \'application/vnd.oasis.opendocument.graphics-template\',
            \'application/vnd.oasis.opendocument.text-web\',
            \'application/vnd.oasis.opendocument.image-template\',
            \'application/vnd.oasis.opendocument.text-master\',
            \'application/vnd.oasis.opendocument.presentation-template\',
            \'application/vnd.oasis.opendocument.spreadsheet-template\',
            \'application/vnd.oasis.opendocument.text-template\',
            \'application/vnd.openofficeorg.extension\',
            \'text/x-pascal\',
            \'application/pkcs10\',
            \'application/x-pkcs12\',
            \'application/x-pkcs7-certificates\',
            \'application/pkcs7-mime\',
            \'application/x-pkcs7-certreqresp\',
            \'application/pkcs7-signature\',
            \'application/vnd.powerbuilder6\',
            \'image/x-portable-bitmap\',
            \'application/x-font-pcf\',
            \'application/vnd.hp-pcl\',
            \'application/vnd.hp-pclxl\',
            \'image/x-pict\',
            \'application/vnd.curl.pcurl\',
            \'image/x-pcx\',
            \'application/pdf\',
            \'application/font-tdpfr\',
            \'image/x-portable-graymap\',
            \'application/x-chess-pgn\',
            \'application/pgp-encrypted\',
            \'application/pkixcmp\',
            \'application/pkix-pkipath\',
            \'application/vnd.3gpp.pic-bw-large\',
            \'application/vnd.mobius.plc\',
            \'application/vnd.pocketlearn\',
            \'application/pls+xml\',
            \'application/vnd.ctc-posml\',
            \'image/png\',
            \'image/x-png\',
            \'image/vnd.mozilla.apng\',
            \'image/x-portable-anymap\',
            \'application/vnd.macports.portpkg\',
            \'application/vnd.ms-powerpoint\',
            \'application/vnd.ms-powerpoint.template.macroenabled.12\',
            \'application/vnd.openxmlformats-officedocument.presentationml.template\',
            \'application/vnd.ms-powerpoint.addin.macroenabled.12\',
            \'application/vnd.cups-ppd\',
            \'image/x-portable-pixmap\',
            \'application/vnd.ms-powerpoint.slideshow.macroenabled.12\',
            \'application/vnd.openxmlformats-officedocument.presentationml.slideshow\',
            \'application/vnd.ms-powerpoint.presentation.macroenabled.12\',
            \'application/vnd.openxmlformats-officedocument.presentationml.presentation\',
            \'application/vnd.lotus-freelance\',
            \'application/pics-rules\',
            \'application/vnd.3gpp.pic-bw-small\',
            \'image/vnd.adobe.photoshop\',
            \'application/x-font-linux-psf\',
            \'application/vnd.pvi.ptid1\',
            \'application/x-mspublisher\',
            \'application/vnd.3gpp.pic-bw-var\',
            \'application/vnd.3m.post-it-notes\',
            \'text/x-python\',
            \'audio/vnd.ms-playready.media.pya\',
            \'application/x-python-code\',
            \'video/vnd.ms-playready.media.pyv\',
            \'application/vnd.epson.quickanime\',
            \'application/vnd.intu.qbo\',
            \'application/vnd.intu.qfx\',
            \'application/vnd.publishare-delta-tree\',
            \'application/vnd.quark.quarkxpress\',
            \'audio/x-pn-realaudio\',
            \'application/vnd.rar\',
            \'application/x-rar-compressed\',
            \'image/x-cmu-raster\',
            \'application/vnd.ipunplugged.rcprofile\',
            \'application/rdf+xml\',
            \'application/vnd.data-vision.rdz\',
            \'application/vnd.businessobjects\',
            \'application/x-dtbresource+xml\',
            \'image/x-rgb\',
            \'application/reginfo+xml\',
            \'application/resource-lists+xml\',
            \'image/vnd.fujixerox.edmics-rlc\',
            \'application/resource-lists-diff+xml\',
            \'application/vnd.rn-realmedia\',
            \'audio/x-pn-realaudio-plugin\',
            \'application/vnd.jcp.javame.midlet-rms\',
            \'application/relax-ng-compact-syntax\',
            \'application/x-rpm\',
            \'application/vnd.nokia.radio-presets\',
            \'application/vnd.nokia.radio-preset\',
            \'application/sparql-query\',
            \'application/rls-services+xml\',
            \'application/rsd+xml\',
            \'application/rss+xml\',
            \'application/rtf\',
            \'text/richtext\',
            \'application/vnd.yamaha.smaf-audio\',
            \'application/sbml+xml\',
            \'application/vnd.ibm.secure-container\',
            \'application/x-msschedule\',
            \'application/vnd.lotus-screencam\',
            \'application/scvp-cv-request\',
            \'application/scvp-cv-response\',
            \'text/vnd.curl.scurl\',
            \'application/vnd.stardivision.draw\',
            \'application/vnd.stardivision.calc\',
            \'application/vnd.stardivision.impress\',
            \'application/vnd.solent.sdkm+xml\',
            \'application/sdp\',
            \'application/vnd.stardivision.writer\',
            \'application/vnd.seemail\',
            \'application/vnd.sema\',
            \'application/vnd.semd\',
            \'application/vnd.semf\',
            \'application/java-serialized-object\',
            \'application/set-payment-initiation\',
            \'application/set-registration-initiation\',
            \'application/vnd.hydrostatix.sof-data\',
            \'application/vnd.spotfire.sfs\',
            \'application/vnd.stardivision.writer-global\',
            \'text/sgml\',
            \'application/x-sh\',
            \'application/x-shar\',
            \'application/shf+xml\',
            \'text/vnd.wap.si\',
            \'application/vnd.wap.sic\',
            \'application/vnd.symbian.install\',
            \'application/x-stuffit\',
            \'application/x-stuffitx\',
            \'application/vnd.koan\',
            \'text/vnd.wap.sl\',
            \'application/vnd.wap.slc\',
            \'application/vnd.ms-powerpoint.slide.macroenabled.12\',
            \'application/vnd.openxmlformats-officedocument.presentationml.slide\',
            \'application/vnd.epson.salt\',
            \'application/vnd.stardivision.math\',
            \'application/smil+xml\',
            \'application/x-font-snf\',
            \'application/vnd.yamaha.smaf-phrase\',
            \'application/x-futuresplash\',
            \'text/vnd.in3d.spot\',
            \'application/scvp-vp-response\',
            \'application/scvp-vp-request\',
            \'application/x-wais-source\',
            \'application/sparql-results+xml\',
            \'application/vnd.kodak-descriptor\',
            \'application/vnd.epson.ssf\',
            \'application/ssml+xml\',
            \'application/vnd.sun.xml.calc.template\',
            \'application/vnd.sun.xml.draw.template\',
            \'application/vnd.wt.stf\',
            \'application/vnd.sun.xml.impress.template\',
            \'application/hyperstudio\',
            \'application/vnd.ms-pki.stl\',
            \'application/vnd.pg.format\',
            \'application/vnd.sun.xml.writer.template\',
            \'application/vnd.sus-calendar\',
            \'application/x-sv4cpio\',
            \'application/x-sv4crc\',
            \'application/vnd.svd\',
            \'image/svg+xml\',
            \'application/x-shockwave-flash\',
            \'application/vnd.arastra.swi\',
            \'application/vnd.sun.xml.calc\',
            \'application/vnd.sun.xml.draw\',
            \'application/vnd.sun.xml.writer.global\',
            \'application/vnd.sun.xml.impress\',
            \'application/vnd.sun.xml.math\',
            \'application/vnd.sun.xml.writer\',
            \'application/vnd.tao.intent-module-archive\',
            \'application/x-tar\',
            \'application/vnd.3gpp2.tcap\',
            \'application/x-tcl\',
            \'application/vnd.smart.teacher\',
            \'application/x-tex\',
            \'application/x-texinfo\',
            \'application/x-tex-tfm\',
            \'image/tiff\',
            \'application/vnd.tmobile-livetv\',
            \'application/x-bittorrent\',
            \'application/vnd.groove-tool-template\',
            \'application/vnd.trid.tpt\',
            \'application/vnd.trueapp\',
            \'application/x-msterminal\',
            \'text/tab-separated-values\',
            \'application/x-font-ttf\',
            \'application/vnd.simtech-mindmapper\',
            \'application/vnd.genomatix.tuxedo\',
            \'application/vnd.mobius.txf\',
            \'application/vnd.ufdl\',
            \'application/vnd.umajin\',
            \'application/vnd.unity\',
            \'application/vnd.uoml+xml\',
            \'text/uri-list\',
            \'application/x-ustar\',
            \'application/vnd.uiq.theme\',
            \'text/x-uuencode\',
            \'application/x-cdlink\',
            \'text/x-vcard\',
            \'application/vnd.groove-vcard\',
            \'text/x-vcalendar\',
            \'application/vnd.vcx\',
            \'application/vnd.visionary\',
            \'video/vnd.vivo\',
            \'model/vrml\',
            \'application/vnd.visio\',
            \'application/vnd.vsf\',
            \'model/vnd.vtu\',
            \'application/voicexml+xml\',
            \'application/x-doom\',
            \'video/mp2t\',
            \'audio/wav\',
            \'audio/x-ms-wax\',
            \'image/vnd.wap.wbmp\',
            \'application/vnd.criticaltools.wbs+xml\',
            \'application/vnd.wap.wbxml\',
            \'application/vnd.ms-works\',
            \'video/x-ms-wm\',
            \'audio/x-ms-wma\',
            \'application/x-ms-wmd\',
            \'application/x-msmetafile\',
            \'text/vnd.wap.wml\',
            \'application/vnd.wap.wmlc\',
            \'text/vnd.wap.wmlscript\',
            \'application/vnd.wap.wmlscriptc\',
            \'video/x-ms-wmv\',
            \'video/x-ms-wmx\',
            \'application/x-ms-wmz\',
            \'application/vnd.wordperfect\',
            \'application/vnd.ms-wpl\',
            \'application/vnd.wqd\',
            \'application/x-mswrite\',
            \'application/wsdl+xml\',
            \'application/wspolicy+xml\',
            \'application/vnd.webturbo\',
            \'video/x-ms-wvx\',
            \'application/vnd.hzn-3d-crossword\',
            \'application/x-silverlight-app\',
            \'application/vnd.xara\',
            \'application/x-ms-xbap\',
            \'application/vnd.fujixerox.docuworks.binder\',
            \'image/x-xbitmap\',
            \'application/vnd.syncml.dm+xml\',
            \'application/vnd.adobe.xdp+xml\',
            \'application/vnd.fujixerox.docuworks\',
            \'application/xenc+xml\',
            \'application/patch-ops-error+xml\',
            \'application/vnd.adobe.xfdf\',
            \'application/vnd.xfdl\',
            \'application/xhtml+xml\',
            \'image/vnd.xiff\',
            \'application/vnd.ms-excel\',
            \'application/vnd.ms-excel.addin.macroenabled.12\',
            \'application/vnd.ms-excel.sheet.binary.macroenabled.12\',
            \'application/vnd.ms-excel.sheet.macroenabled.12\',
            \'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet\',
            \'application/vnd.ms-excel.template.macroenabled.12\',
            \'application/vnd.openxmlformats-officedocument.spreadsheetml.template\',
            \'application/xml\',
            \'application/vnd.olpc-sugar\',
            \'application/xop+xml\',
            \'application/x-xpinstall\',
            \'image/x-xpixmap\',
            \'application/vnd.is-xpr\',
            \'application/vnd.ms-xpsdocument\',
            \'application/vnd.intercon.formnet\',
            \'application/xslt+xml\',
            \'application/vnd.syncml+xml\',
            \'application/xspf+xml\',
            \'application/vnd.mozilla.xul+xml\',
            \'image/x-xwindowdump\',
            \'chemical/x-xyz\',
            \'application/vnd.zzazz.deck+xml\',
            \'application/zip\',
            \'application/x-zip-compressed\',
            \'application/zip-compressed\',
            \'application/vnd.zul\',
            \'application/vnd.handheld-entertainment+xml\',
            \'image/x-adobe-dng\',
            \'image/x-sony-arw\',
            \'image/x-canon-cr2\',
            \'image/x-canon-crw\',
            \'image/x-kodak-dcr\',
            \'image/x-epson-erf\',
            \'image/x-kodak-k25\',
            \'image/x-kodak-kdc\',
            \'image/x-minolta-mrw\',
            \'image/x-nikon-nef\',
            \'image/x-olympus-orf\',
            \'image/x-pentax-pef\',
            \'image/x-fuji-raf\',
            \'image/x-panasonic-raw\',
            \'audio/flac\',
            \'image/x-sony-sr2\',
            \'image/x-sony-srf\',
            \'image/x-sigma-x3f\',
            \'application/csv\',
            \'text/x-csv\',
            \'application/x-csv\',
            \'text/x-comma-separated-values\',
            \'text/comma-separated-values\',
            \'text/x.gcode\',
            \'text/x-gcode\',
            \'application/javascript\',
            \'application/x-ecmascript\',
            \'application/x-javascript\',
            \'text/ecmascript\',
            \'text/javascript1.0\',
            \'text/javascript1.1\',
            \'text/javascript1.2\',
            \'text/javascript1.3\',
            \'text/javascript1.4\',
            \'text/javascript1.5\',
            \'text/jscript\',
            \'text/livescript\',
            \'text/x-ecmascript\',
            \'text/x-javascript\',
            \'audio/mp3\',
            \'audio/mpeg3\',
            \'audio/x-mpeg-3\',
            \'application/x-pdf\',
            \'audio/x-wav\',
            \'audio/vnd.wave\',
            \'audio/wave\',
            \'audio/x-pn-wav\',
            \'audio/x-flac\'
        )');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('file', function (Blueprint $table) {
            //
        });
    }
};

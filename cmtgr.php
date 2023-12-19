<?php
@system('clear');
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*** ====================[ Color ]======================== ***/
$nau = "\e[38;5;94m";
$xnhac = "\033[1;96m";
$den = "\033[1;90m";
$do = "\033[1;91m";
$luc = "\033[1;92m";
$vang = "\033[1;93m";
$xduong = "\033[1;94m";
$hong = "\033[1;95m";
$trang = "\033[1;97m";
//========================[ USERAGENT ]========================
$_SESSION['useragent'] = 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36';
$useragent = $_SESSION['useragent'];
//======================[ Đánh Dấu Bản Quyền ]========================
$ndp_tool = $trang."~".$trang."[".$do ."🌸".$trang."] ".$trang."➩ ";
$ndp = $trang."~".$trang."[".$do."🌸".$trang."] ".$trang."➩ ";
/***[ Config ]***/
$_SESSION['version'] = "1.2";
$_SESSION['shop'] = "Subre69.site";
$loai = '1';
/***[ Banner ]***/
$banner = "
     \033[1;35m██████╗    ████████╗ ██████╗  ██████╗ ██╗     
     \033[1;37m██╔══██╗   ╚══██╔══╝██╔═══██╗██╔═══██╗██║     
     \033[1;35m██████╔╝█████╗██║   ██║   ██║██║   ██║██║     
     \033[1;37m██╔═══╝ ╚════╝██║   ██║   ██║██║   ██║██║     
     \033[1;35m██║           ██║   ╚██████╔╝╚██████╔╝███████╗
     \033[1;37m╚═╝           ╚═╝    ╚═════╝  ╚═════╝ ╚══════╝
\n";


spamcmtgr($banner, $ndp_tool);
while (true) {
    $xnhac = "\033[1;96m";
    $luc = "\033[1;92m";
    $hong = "\033[1;95m";
    $do = "\033[1;31m";
    $vang = "\033[1;93m";
    $trang = "\033[1;97m";
    $thanhngang = $vang . "----------------------------------------------------------\n";
    $thanhngang;
    $khocki = [];
    $list_name = [];
    $list_id = [];
    $khogr = [];
    echo $ndp_tool . $luc . "Bạn Muốn Nhập Bao Nhiêu Cookie: $vang";
    $slg = trim(fgets(STDIN));
    echo "\e[1;31m".str_repeat('──', 32)."\n";
    while ($a < $slg) {
        $a++;
        echo $ndp_tool . $luc . "Vui Lòng Nhập Cookie Thứ ".$trang."$a: $vang";
        $nhapck = (string)trim(fgets(STDIN));
        if ($nhapck == '') {
            break;
        }
        echo "\e[1;31m".str_repeat('──', 32)."\n";

        $cookie = ($nhapck);
        $page = thongtin('me', $cookie, $useragent);
        //lấy tên
        $tenfb = explode('<', explode('>', explode('</span>', explode('<span>', $page)[2])[0])[1])[0];
        $idfb = explode('%', explode('?lst=', $page)[1])[0];
        if ($idfb == "") {
            echo $do . " Cookie Die.                   \n";
            $a--;
            continue;
        }
        @system('clear');
        spamcmtgr($banner, $ndp_tool);
        echo $ndp_tool . $luc . "Bạn Muốn Nhập Bao Nhiêu ID GROUP: $vang";
        $slgr = trim(fgets(STDIN));
        echo "\e[1;31m".str_repeat('──', 32)."\n";
        echo $ndp_tool . $luc . "Nhập ID Hoặc Link Group Đều Được Nha.\n";
        while ($b < $slgr) {
            $b++;
            echo $ndp_tool . $luc . "Nhập ID GROUP Thứ ".$trang.$b.": $vang";
            $nhapgr = (string)trim(fgets(STDIN));
            echo "\e[1;31m".str_repeat('──', 32)."\n";
            if ($nhapgr == '') {
                break;
            }
            if (strpos($nhapgr, 'facebook')) {
                $nhapgr = get_idfb($nhapgr);
            }
            $error = check($cookie, $idgr);
            if ($error !== false) {
                echo $error . "\n";
                $a--;
                continue;
            } else {
                array_push($khogr, $nhapgr);
                $page = thongtin('me', $cookie, $useragent);
                //lấy tên
                $tenfb = explode('<', explode('>', explode('</span>', explode('<span>', $page)[2])[0])[1])[0];
                $idfb = explode('%', explode('?lst=', $page)[1])[0];
                array_push($khocki, $nhapck);
                array_push($list_name, $tenfb);
                array_push($list_id, $idfb);
            }
        }
    }
    $soacc = count($khocki);
    echo "\e[1;31m".str_repeat('──', 32)."\n";
        // nhập nội dung
        $khoCMT = [];
        echo $ndp_tool . $luc . "Bạn Muốn Nhập Bao Nhiêu Nội Dung".$trang.":".$vang." ";
        $snd = (string)trim(fgets(STDIN));
        echo "\e[1;31m".str_repeat('──', 32)."\n";
        echo $ndp_tool . $luc . "Lưu ý: $vang Nội Dung Phải Được Viết Cùng 1 Dòng, Và Không Được Viết Dấu, Không Được Ấn Xuống Hàng Trong Nội Dung Comment, Nội Dung Chỉ Có Thể Chứa Link Của Một Số Trang Web, Hãy Test Trước Xem Các Đường Link Đó Có Thể Chạy Tool Không Và Nếu Như Không Chạy Hãy Xóa Thử Link Web Hoặc Kiểm Tra Nhóm Có Cho Phép Bạn Comment Với Nội Dung Đó Không Nhé. \n";
        while ($x < $snd) {
            $x++;
            echo $ndp_tool . $luc . "Nhập Nội Dung Thứ ".$trang.$x.": $vang";
            $nhapcmt = (string)trim(fgets(STDIN));
            echo "\e[1;31m".str_repeat('──', 32)."\n";
            if ($nhapcmt == '') {
                break;
            }
            array_push($khoCMT, $nhapcmt);
        }
    
    $soacc = count($khoCMT);
    @system('clear');
    spamcmtgr($banner, $ndp_tool);
    echo $ndp_tool . $luc . "Vui Lòng Nhập Delay".$trang.": $vang";
    $delay = trim(fgets(STDIN));
    echo "\e[1;31m".str_repeat('──', 32)."\n"; 
    echo $ndp_tool . $luc . "Sau Bao Nhiêu Nhiệm Vụ Thì Chuyển Acc".$trang.": $vang";
    $yyy = trim(fgets(STDIN));
    echo "\e[1;31m".str_repeat('──', 32)."\n"; 
    echo $ndp_tool . $luc . "Nhập Số Lần Comment".$trang.": $vang";
    $stop = trim(fgets(STDIN));
    //start
    $kho_ID = [];
    while (true) {
        if (count($khocki) == 0) {
            echo "\e[1;31m".str_repeat('──', 32)."\n"; 
            $khocki = [];
            $list_name = [];
            $list_id = [];
            $a = 0;
            echo $ndp_tool . $luc . "Bạn Muốn Nhập Bao Nhiêu Cookie: $vang";
            $slg = trim(fgets(STDIN));
            while ($a < $slg) {
                $a++;
                echo $ndp_tool . $luc . "Nhập Cookie Thứ ".$trang.$a.": $vang";
                $nhapck = (string)trim(fgets(STDIN));
                if ($nhapck == '') {
                    break;
                }
                $cookie = ($nhapck);
                $page = thongtin('me', $cookie, $useragent);
                //lấy tên
                $tenfb = explode('<', explode('>', explode('</span>', explode('<span>', $page)[2])[0])[1])[0];
                $idfb = explode('%', explode('?lst=', $page)[1])[0];
                if ($idfb == "") {
                    echo $do . " Cookie Die.                   \n";
                    $a--;
                    continue;
                } else {
                    $page = thongtin('me', $cookie, $useragent);
                    //lấy tên
                    $tenfb = explode('<', explode('>', explode('</span>', explode('<span>', $page)[2])[0])[1])[0];
                    $idfb = explode('%', explode('?lst=', $page)[1])[0];
                    array_push($khocki, $nhapck);
                    array_push($list_name, $tenfb);
                    array_push($list_id, $idfb);
                }
            }
        }
        for ($xz = 0; $xz < count($khocki); $xz++) {
            $idgr = $khogr[$xz];
            $cookie = $khocki[$xz];
            $page = thongtin('me', $cookie, $useragent);
                //lấy tên
                $tenfb = explode('<', explode('>', explode('</span>', explode('<span>', $page)[2])[0])[1])[0];
                $idfb = explode('%',explode('?lst=', $page)[1])[0];
            if ( $idfb == "") { 
                echo $do." Cookie Die.                   \n"; $a--; continue;
            } 
            echo "\e[1;31m".str_repeat('──', 32)."\n"; 
            echo $vang . "ID FB: " . $luc . $list_id[$xz] . $do . " | " . $vang . "Tên FB: " . $luc . $list_name[$xz] . $do . " | " . $vang . "ID Group: " . $luc . $idgr . "\n";
            echo "\e[1;31m".str_repeat('──', 32)."\n"; 
            $spam = 0;
            while (true) {
                if ($spam == 1) {
                    break;
                }
                //làm nv
                $list = getbv($cookie, $idgr);
                foreach ($list as $id) {
                    if ((in_array($id, $kho_ID) !== true) and  $id !== '') {
                        $zz = array_rand($khoCMT);
                        $msg = $khoCMT[$zz];
                        
                        cmt_fb_cookie_new($id,$cookie,$msg);
                        $page = thongtin('me', $cookie, $useragent);
                        //lấy tên
                        $tenfb = explode('<', explode('>', explode('</span>', explode('<span>', $page)[2])[0])[1])[0];
                        $idfb = explode('%',explode('?lst=', $page)[1])[0];
                        if ($idfb == '') {
                            echo "\033[1;91m  Cookie Die. ";
                            echo "\n";
                            $spam = 1;
                            break;
                        }
                        $dem++;
                        $a = "\033[1;91m[\033[1;93m" . $dem . "\033[1;91m]\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m CMT\033[1;91m | \033[1;97m" . $id . "\033[1;91m | \033[1;96m" . $msg . " \033[1;91m|\n";
                        $len = strlen($a);
                        for ($x = 0; $x < $len; $x++) {
                            echo $a[$x];
                            usleep(2000);
                        }
                        if ($dem >= $stop) {
                            echo "\e[1;31m".str_repeat('──', 32)."\n"; 
                            echo $ndp_tool . $luc . "Bạn Có Muốn Chạy Tiếp Không ".$do."(".$vang."y/n".$do.")".$trang.": $vang";
                            $stoppp = (string)trim(fgets(STDIN));
                            if ($stoppp == "y") {
                                echo $ndp_tool . $luc . "Bạn Muốn Chạy Tiếp Bao Nhiêu Cmt".$trang.": $vang";
                                $chaytiep = (string)trim(fgets(STDIN));
                                $stop = $stop + $chaytiep;
                                echo "\e[1;31m".str_repeat('──', 32)."\n"; 
                            } else if ($stoppp == "n") {
                                echo $do . "Cảm Ơn Bạn Đã Sử Dụng Tool Của".$xnhac." Nguyễn Đức Phát\n";
                                exit;
                            }
                        }
                        array_push($kho_ID, $id);
                        delayspamcmt($delay);
                        if ($dem % $yyy == 0) {
                            $spam = 1;
                            break;
                        }
                    } else {
                        echo $do . " Đang Lướt Tìm Bài Viết.                      \r";
                    }
                } //for nội dung
            } // white nhỏ
        } // for $khocki
    } //while lớn
}


function thongtin($id, $cookie, $useragent)
{

    $ch = curl_init();
    $header = array(
        "Host:m.facebook.com",
        "user-agent:$useragent",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "cookie:$cookie",
    );
    $linkbv = 'https://m.facebook.com/' . $id . '/about';
    curl_setopt($ch, CURLOPT_URL, $linkbv);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
    :'));
    $page = curl_exec($ch);
    $page1 = json_decode($page);
    //echo "\n".$page."\n\n\n\n";

    // $code_post = explode('<span>', $page)[2];
    // $code_post = explode('</span>', $code_post)[0];
    //   echo "\n\n".$code_post;
    // $id_post = explode('mf_story_key":"', $code_post)[1];
    // $id_post = explode('"', $id_post)[0];


    // //tennguoidung
    return $page;
}
function get_idfb($link)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://id.traodoisub.com/api.php');
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.56 Safari/537.36');
    $da = 'link=' . $link;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $da);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $jk = curl_exec($ch);
    curl_close($ch);
    // $id = explode('id":', $id)[1];
    // $id = explode(',', $id)[0];
    if (strpos($jk, '"id":"')) {
        $id = explode('id":"', $jk)[1];
        $id = explode('"', $id)[0];
    } else {
        $id = explode('id":', $jk)[1];
        $id = explode(',', $id)[0];
    }
    return $id;
}
function check($cookie, $idgr)
{
    $head = array("Connection: keep-alive", "Keep-Alive: 300", "authority: m.facebook.com", "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5", "cache-control: max-age=0", "upgrade-insecure-requests: 1", "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9", "sec-fetch-site: none", "sec-fetch-mode: navigate", "sec-fetch-user: ?1", "sec-fetch-dest: document");
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://mbasic.facebook.com/" . $idgr,
        CURLOPT_USERAGENT => $_SESSION['useragent'],
        CURLOPT_COOKIE => $cookie,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_CONNECTTIMEOUT => 60,
        CURLOPT_FOLLOWLOCATION => TRUE
    ));
    $access = curl_exec($ch);
    curl_close($ch);

    if (strpos($access, 'Không tìm thấy trang bạn yêu cầu.') != false) {
        $error = "Không Tìm Thấy Group";
    } else if (strpos($access, '<input value="Tham gia') != false) {
        $error = "Bạn Chưa Tham Gia Group Này";
    } else {
        $error = false;
    }
    return $error;
}
function cmt_fb_cookie_new($id,$cookie,$msg){
$mr = curl_init();
$head = [
    "Host:mbasic.facebook.com",
    'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
    "sec-ch-ua-mobile:?1",
    "cache-control:max-age=0",
    "upgrade-insecure-requests:1",
    "dnt:1",
    "save-data:on",
    "user-agent:Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36",
    "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
    "sec-fetch-site:same-origin",
    "sec-fetch-mode:navigate",
    "sec-fetch-user:?1",
    "sec-fetch-dest:document",
    "referer:https://mbasic.facebook.com/",
    "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",];
curl_setopt($mr, CURLOPT_URL, "https://mbasic.facebook.com/$id");
curl_setopt($mr, CURLOPT_COOKIE, $cookie);
curl_setopt($mr, CURLOPT_HTTPHEADER, $head);
curl_setopt($mr, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($mr, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($mr, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($mr, CURLOPT_FOLLOWLOCATION, TRUE);
$mr2 = curl_exec($mr);
$fb_dtsg = explode('"',explode('fb_dtsg" value="',$mr2)[1])[0];
$jazoest = explode('"',explode('jazoest" value="',$mr2)[1])[0];
$cmt = explode('"',explode('action="/a/comment.php?',$mr2)[1])[0];
$text = "fb_dtsg=".$fb_dtsg."&jazoest=".$jazoest."&comment_text=".$msg;
curl_setopt($mr, CURLOPT_URL, "https://mbasic.facebook.com/a/comment.php?".htmlspecialchars_decode($cmt));
curl_setopt($mr, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($mr, CURLOPT_POSTFIELDS, $text);
$mr2 = curl_exec($mr);
curl_close($mr);
}
function getbv($cookie, $idgr)
{
    $head = array("Connection: keep-alive", "Keep-Alive: 300", "authority: m.facebook.com", "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5", "cache-control: max-age=0", "upgrade-insecure-requests: 1", "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9", "sec-fetch-site: none", "sec-fetch-mode: navigate", "sec-fetch-user: ?1", "sec-fetch-dest: document");
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://mbasic.facebook.com/" . $idgr,
        CURLOPT_USERAGENT => $_SESSION['useragent'],
        CURLOPT_COOKIE => $cookie,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_CONNECTTIMEOUT => 60,
        CURLOPT_FOLLOWLOCATION => TRUE
    ));
    $access = curl_exec($ch);
    curl_close($ch);
    $stool = [];
    $list = explode('https://mbasic.facebook.com/groups/', $access);
    for ($i = 2; $i < count($list) / 3; $i++) {
        $mr = explode('?refid=', $list[$i * 3])[0];
        if (strpos($mr, 'permalink') != false) {
            $id = explode('/', explode('permalink/', $mr)[1])[0];;
            array_push($stool, $id);
        }
    }
    return $stool;
}
function comment($id, $access_token, $msg)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $id . '/comments');
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "authority: m.facebook.com";
    $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
    $head[] = "cache-control: max-age=0";
    $head[] = "upgrade-insecure-requests: 1";
    $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
    $head[] = "sec-fetch-site: none";
    $head[] = "sec-fetch-mode: navigate";
    $head[] = "sec-fetch-user: ?1";
    $head[] = "sec-fetch-dest: document";
    curl_setopt($ch, CURLOPT_USERAGENT, $_SESSION['useragent']);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $data = array(
        'message' => $msg,
        'access_token' => $access_token,
    );
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $access = curl_exec($ch);
    curl_close($ch);
    return json_decode($access, true);
}
function comments($id, $access_token, $msg, $linkanh)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $id . '/comments');
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "authority: m.facebook.com";
    $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
    $head[] = "cache-control: max-age=0";
    $head[] = "upgrade-insecure-requests: 1";
    $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
    $head[] = "sec-fetch-site: none";
    $head[] = "sec-fetch-mode: navigate";
    $head[] = "sec-fetch-user: ?1";
    $head[] = "sec-fetch-dest: document";
    curl_setopt($ch, CURLOPT_USERAGENT, $_SESSION['useragent']);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $data = array(
        'message' => $msg,
        'access_token' => $access_token,
        'attachment_url' => $linkanh
    );
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $access = curl_exec($ch);
    curl_close($ch);
    return json_decode($access, true);
}
function commentgif($id, $access_token, $msg, $linkgif)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $id . '/comments');
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "authority: m.facebook.com";
    $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
    $head[] = "cache-control: max-age=0";
    $head[] = "upgrade-insecure-requests: 1";
    $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
    $head[] = "sec-fetch-site: none";
    $head[] = "sec-fetch-mode: navigate";
    $head[] = "sec-fetch-user: ?1";
    $head[] = "sec-fetch-dest: document";
    curl_setopt($ch, CURLOPT_USERAGENT, $_SESSION['useragent']);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $data = array(
        'message' => $msg,
        'access_token' => $access_token,
        'attachment_share_url' => $linkgif
    );
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $access = curl_exec($ch);
    curl_close($ch);
    return json_decode($access);
}
function delayspamcmt($delay){
    for($ndp = $delay ;$ndp>= 1;$ndp--){
echo "\r\033[1;37m[\033[1;36mĐ\033[1;31mT\033[1;32mP\033[1;33m-\033[1;34mT\033[1;35mO\033[1;37mO\033[1;36mL\033[1;37m][\033[1;36m|\033[1;37m]\033[1;37m[.......\033[1;37m][\033[1;33m".$ndp."\033[1;37m] "; usleep(150000);
echo "\r\033[1;37m[\033[1;31mĐ\033[1;32mT\033[1;33mP\033[1;34m-\033[1;35mT\033[1;37mO\033[1;36mO\033[1;31mL\033[1;37m][\033[1;31m/\033[1;37m]\033[1;37m[\033[1;36m>\033[1;37m......\033[1;37m][\033[1;33m".$ndp."\033[1;37m]  "; usleep(150000);
echo "\r\033[1;37m[\033[1;32mĐ\033[1;33mT\033[1;34mP\033[1;35m-\033[1;37mT\033[1;36mO\033[1;31mO\033[1;32mL\033[1;37m][\033[1;32m-\033[1;37m]\033[1;37m[\033[1;31m>\033[1;32m>\033[1;37m.....\033[1;37m][\033[1;33m".$ndp."\033[1;37m]   "; usleep(150000);
echo "\r\033[1;37m[\033[1;33mĐ\033[1;34mT\033[1;35mP\033[1;37m-\033[1;36mT\033[1;31mO\033[1;32mO\033[1;33mL\033[1;37m][\033[1;33m\]\033[1;37m[\033[1;36m>\033[1;32m>\033[1;33m>\033[1;37m....\033[1;37m][\033[1;33m".$ndp."\033[1;37m]    "; usleep(150000);
echo "\r\033[1;37m[\033[1;34mĐ\033[1;35mT\033[1;37mP\033[1;36m-\033[1;31mT\033[1;32mO\033[1;33mO\033[1;34mL\033[1;37m][\033[1;34m|\033[1;37m]\033[1;37m[\033[1;36m>\033[1;32m>\033[1;33m>\033[1;34m>\033[1;37m...\033[1;37m][\033[1;33m".$ndp."\033[1;37m]     "; usleep(150000);
echo "\r\033[1;37m[\033[1;35mĐ\033[1;37mT\033[1;36mP\033[1;31m-\033[1;32mT\033[1;33mO\033[1;34mO\033[1;35mL\033[1;37m][\033[1;35m-\033[1;37m]\033[1;37m[\033[1;36m>\033[1;32m>\033[1;33m>\033[1;34m>\033[1;35m>\033[1;37m..\033[1;37m][\033[1;33m".$ndp."\033[1;37m]      "; usleep(150000);
echo "\r\033[1;37m[\033[1;37mĐ\033[1;36mT\033[1;31mP\033[1;32m-\033[1;33mT\033[1;34mO\033[1;35mO\033[1;37mL\033[1;37m][\033[1;37m+\033[1;37m]\033[1;37m[\033[1;36m>\033[1;32m>\033[1;33m>\033[1;34m>\033[1;35m>\033[1;37m>\033[1;36m>\033[1;37m][\033[1;33m".$ndp."\033[1;37m]       "; usleep(150000);
}
echo "\r\e[1;95m    🌸Đinh Tấn Phát🌸                       \r";
}
function spamcmtgr($banner, $ndp_tool){
    for($i = 0; $i < strlen($banner); $i++){echo $banner[$i];usleep($_SESSION['load']);}
    echo "\033[1;37m~\033[1;32m Cung Cấp Dịch Vụ MXH Giá Rẻ Tại\033[1;37m: ".$_SESSION['shop']."\n"; 
    echo "\e[1;31m".str_repeat('──', 32)."\n";
    echo $ndp_tool."\033[1;35mTOOL SPAM CMT GROUP ĐA LUỒNG VERSION ".$_SESSION['version']."\n"; usleep($_SESSION['load']);
    echo $ndp_tool."\033[1;33mBản Quyền: \033[1;34mĐinh Tấn Phát\n"; usleep($_SESSION['load']);
    echo $ndp_tool."\033[1;32mSupport Tool: \033[1;33mĐinh Tấn Phát\n"; usleep($_SESSION['load']);
    echo $ndp_tool."\033[1;31mZalo Admin: \033[1;35m0964747434\n"; usleep($_SESSION['load']);
    echo $ndp_tool."\033[1;36mZalo Support: \033[1;37m0964747434\n"; usleep($_SESSION['load']);
    echo "\e[1;31m".str_repeat('──', 32)."\n";
}
<?php
$access_token = 'ySsjC+XvhFPDIyKYsDUQCaMSR5bXUK8evVsio0egSPckkHzcb5RNqLVdCQoawpSsW9UZwQquPihk9R6y0k2XokhC+tE84dI33Vnyv7eIW3OCRomDztQf+vlugYbipmND4JtU37hgv6cLot3QEABlPQdB04t89/1O/w1cDnyilFU=';



// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
	// 	เดี๋ยวใช้ต่อ	
			$ans = file_get_contents('http://202.28.37.32/smartcsmju/project_class/Line_IOT/test_php_to_mqtt_js.php?msg='.$text);
			
			//$s_ans = file_get_contents('http://202.28.37.32/smartcsmju/Line_INTNINBOT/check_MSG.php?msg='.$strMSG);
			// Get replyToken
			$replyToken = $event['replyToken'];
			

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $ans
			];
			
			
			if((eregi ( "ตำรวจ", $text ))or(eregi ( "เรียกตำรวจ", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'โทรเลยเบอร์ 191'
				];
			}else if((eregi ( "Chatbot", $text, $regs ))or(eregi ( "Line bot", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'บอท (bot) คือโปรแกรมอัตโนมัติ สำหรับทำหน้าที่อย่างใดอย่างหนึ่ง บนอินเทอร์เน็ต ซึ่งย่อมาจากคำว่าโรบอต (robot)'
				];
			}else if((eregi ( "Hello", $text ))or(eregi ( "สวัสดี", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'สวัสดีครับ
'
				];
			}else if((eregi ( "หาช่างประปา", $text ))or(eregi ( "น้ำไม่ไหล", $text ))or(eregi ( "การประปา", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'เรียกประปาโทร 1162 หรือ http://www.pwa.co.th/contactus/telephone ครับ'
				];
			}else if((eregi ( "หาช่างไฟ", $text, $regs ))or(eregi ( "การไฟฟ้า", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'ถ้าอยากให้ใครดีกับเราเราต้องทำดีกับเขาก่อนดูครับ'
				];
			}else if((eregi ( "โดนเท", $text ))or(eregi ( "ผู้หญิงทิ้ง", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'เป็นกำลังใจให้นะ พยายามเข้าล่ะ'
				];
			}else if((eregi ( "อยากกินไก่", $text ))or(eregi ( "โทรสั่งไก่", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'ไก่อะไรดีล่ะ
					1. ไก่ KFC โทร 1150 แล้วกด 1
					2. ไก่ McDonulds โทร 1711 
					3. ไก่ เชสเตอร์กิลล์ โทร 1125'
				];
				
			}else if((eregi ( "สั่งพิซซ่า", $text ))or(eregi ( "พิซซ่า", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'1. The Pizza company โทร 1112
					2. Pizza Hut โทร 1150 แล้วกด 2'
				];
			
			}else if((eregi ( "ดับเพลิง", $text ))or(eregi ( "ไฟไหม้", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'รีบโทรเลย 199'
				];	
			}else if((eregi ( "ช่างซ่อมเครื่องใช้ไฟฟ้า", $text ))or(eregi ( "ซ่อมของใช้", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'โทรเลย 084746XXXX ในเขตเชียงใหม่ หรือ www.fixeletric.com ทั่วประเทศ'
				];	
			
			}else if((eregi ( "ดับเพลิง", $text ))or(eregi ( "ไฟไหม้", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'รีบโทรเลย 199'
				];
			}else if((eregi ( "ซื้อสินค้า", $text ))or(eregi ( "Shopping", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'www.lazada.co.th'
				];		
			}else if((eregi ( "บาย", $text ))or(eregi ( "ลาก่อน", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'บายนะ! มีเรื่องอะไรทักหา Bot นะ'
				];		
			}
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>

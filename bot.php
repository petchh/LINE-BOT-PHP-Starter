<?php
$access_token = 'mdUfi036U4HKokM8zkcdBmj5imHO0bw7lvrCHU6oMuA4y2U+dM0kjKqgpSwYVz6r/5Dn3S7qL+OyYaI2S7YTivOsVtD3Oy9S7yivMUAnvPZxHdPPT6Vkl+LjO3PncXf913PbKdos1qkWz1oOPOCQswdB04t89/1O/w1cDnyilFU=';



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
			$ans = file_get_contents('http://202.28.37.32/smartcsmju/project_class/Line_IOT/test_php_to_mqtt_js.php?msg='.$text);
			
			//$s_ans = file_get_contents('http://202.28.37.32/smartcsmju/Line_INTNINBOT/check_MSG.php?msg='.$strMSG);
			// Get replyToken
			$replyToken = $event['replyToken'];
			

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $ans
			];
			
			if((eregi ( "cs442", $text ))or(eregi ( "คพ442", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'ลองไปดูในนี้นะ มีรายละเอียดอยู่ http://reg.mju.ac.th/enrollguide.htm'
				];
			}else if((eregi ( "ตำรวจ", $text ))or(eregi ( "แจ้งตำรวจ", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'โทรเลย เบอร์ 191'
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
			}else if((eregi ( "น้ำไม่ไหล", $text ))or(eregi ( "ประปา", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'เรียกประปาโทร 1162 หรือ http://www.pwa.co.th/contactus/telephone ครับ'
				];
			}else if((eregi ( "หิว", $text, $regs ))or(eregi ( "สั่งไก่", $text, $regs ))or(eregi ( "อยากกินไก่", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'กินไก่อะไรดีล่ะ ? 
					1.ไก่ KFC โทร 1150 แล้วกด 1,
					2. ไก่ McDonulds โทร 1711, 
					3. ไก่ เชสเตอร์กิลล์ โทร 1125
'
				];
			}else if((eregi ( "ไฟดับ", $text ))or(eregi ( "ไฟฟ้า", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'โทรเลยครับ เบอร์ 1129 หรือที่ https://www.pea.co.th/ติดต่อเรา'
				];
			}else if((eregi ( "ไฟไหม้", $text ))or(eregi ( "ดับเพลิง", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'โทรเลยครับ เบอร์ 199'
				];
				
			}else if((eregi ( "อสังหาริมทรัพย์", $text ))or(eregi ( "ที่อยู่อาศัย", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'เลือกซื้อที่อยู่อาศัย อสังหาริมทรัพย์ หรือปรึกษาด้านต่างๆ เกี่ยวกับ Property ที่ http://www.reic.or.th/Default.aspx'
				];
			
			}else if((eregi ( "สั่งพิซซ่า", $text ))or(eregi ( "พิซซ่า", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'สั่งพิซซ่ามาทานร้านไหนดี ?
					1.The Pizza โทร 1112 หรือ 2.Pizza Hut โทร 1150 กด 2'
				];
			}else if((eregi ( "ปรึกษาทางด้านการเงิน", $text ))or(eregi ( "การเงิน", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'ไปที่ www.pd-wealth.com/ ที่ปรึกษาทางด้านการเงินครบวงจรหรือโทร 1235'
				];
			}else if((eregi ( "ช่างซ่อมเครื่องใช้ไฟฟ้า", $text ))or(eregi ( "ช่างซ่อมของใช้", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'โทรไปที่เบอร์ 0847460000 ในเชียงใหม่ หรือ www.fixeletric.com ทั่วประเทศ'
				];
			}else if((eregi ( "ซื้อสินค้า", $text ))or(eregi ( "Shopping", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'www.lazada.co.th หรือโทร 020180000 ทั่วประเทศ'
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
			}else if((eregi ( "อยากกลับบ้าน", $text ))or(eregi ( "คิดถึงบ้าน", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'จองตั๋วเครื่องบินสิครับ รถทัวร์ก็ได้นะ'
				];
			}else if((eregi ( "ขาดความอบอุ่น", $text, $regs ))or(eregi ( "ต้องการคนสนใจ", $text, $regs ))or(eregi ( "อยากให้มีคนสนใจ", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'ถ้าอยากให้ใครดีกับเราเราต้องทำดีกับเขาก่อนดูครับ'
				];
			}else if((eregi ( "โดนเท", $text ))or(eregi ( "ผู้หญิงทิ้ง", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'เป็นกำลังใจให้นะ พยายามเข้าล่ะ'
				];
			}else if((eregi ( "หน้ากากทุเรียน", $text ))or(eregi ( "The mask singer", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'ดีต่อใจฝุดๆ เพลงเพราะมาก'
				];
				
			}else if((eregi ( "ผู้หญิงชอบคนเลว", $text ))or(eregi ( "ทำดีไปก็เท่านั้น", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'ผู้หญิงจิตใจลึกลับซับซ้อนยิ่งกว่าเขาวงกต คนดีๆมีก็ไม่เลือก ชอบคนเลวได้ไงไม่เข้าใจเหมือนกัน'
				];
			
			}else if((eregi ( "ลืมเค้าไม่ได้", $text ))or(eregi ( "ทำไมถึงโดนทิ้ง", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'ผู้หญิงก็แบบนี้ล่ะครับ ตาบอดกันทั้งนั้น'
				];	
			}else if((eregi ( "บาย", $text ))or(eregi ( "ลาก่อน", $text ))){
				$messages = [
					'type'=>'text',
					'text' =>'บายนะ! เวลาปรึกษาทักหา Bot นะ :)'
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

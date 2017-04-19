<?php
$access_token = 'mdUfi036U4HKokM8zkcdBmj5imHO0bw7lvrCHU6oMuA4y2U+dM0kjKqgpSwYVz6r/5Dn3S7qL+OyYaI2S7YTivOsVtD3Oy9S7yivMUAnvPZxHdPPT6Vkl+LjO3PncXf913PbKdos1qkWz1oOPOCQswdB04t89/1O/w1cDnyilFU=';
$msg="";
$m_type="";
$regs="";
$msg_check="";


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
			
			if((eregi ( "วิธีลงทะเบียน", $text, $regs ))or(eregi ( "การลงทะเบียน", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'ทำตามขั้นตอนตามนี้เลยครับ http://reg.mju.ac.th/enrollguide.htm'
				];
			}else if((eregi ( "Transcript", $text, $regs ))or(eregi ( "ทรานสคริป", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'เข้า www.education.mju.ac.th แล้วเลือก เข้าสุ่ระบบนักศึกษาครับ'
				];
			}else if((eregi ( "คศ101", $text, $regs ))or(eregi ( "แคลคูลัส 1", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'คศ101	แคลคูลัส 1
	Course Description:
	ลิมิตและความต่อเนื่อง อนุพันธ์ การประยุกต์ของอนุพันธ์ ดิฟเฟอเรนเชียลและอินทริกัลป์ไม่จำกัดเขต อินทริกัลป์จำกัดเขต และการประยุกต์ อนุพันธ์ย่อย
	Limit and continuity of functions, the derivative of algebraic functions and transcendental functions, the indefinite integrals and techniques of integration, and the definite integrals with applications
'
				];
			}else if((eregi ( "ลงทะเบียนต่ำกว่า 9 หน่วย", $text, $regs ))or(eregi ( "ลงทะเบียนน้อยกว่า 9 หน่วย", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'แนะนำให้ดาวน์โหลด มจท32 ที่เว็บ education.mju.ac.th แล้วยื่นที่งานตารางสอนครับ'
				];
			}else if((eregi ( "ขาดความอบอุ่น", $text, $regs ))or(eregi ( "ต้องการคนสนใจ", $text, $regs ))or(eregi ( "อยากให้มีคนสนใจ", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'ถ้าอยากให้ใครดีกับเราเราต้องทำดีกับเขาก่อนดูนะครับ'
				];
			}else if((eregi ( "ทะเลาะกับแฟน", $text, $regs ))or(eregi ( "ผิดกับแฟน", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'การทะเลาะกันไม่ทำให้ใครมีความสุขหรอกนะครับ ลองใจเย็นๆแล้วคุยกันดีๆนะ ^^'
				];
			}else if((eregi ( "ชั่วโมงกิจกรรม", $text, $regs ))or(eregi ( "เวลาโมงกิจกรรม", $text, $regs ))){
				$messages = [
					'type'=>'text',
					'text' =>'สามารถตรวจสอบจำนวนชั่วโมงกิจกรรมได้ที่ www.erp.mju.ac.th/student/signin.aspx?/typeAuthentication=1'
				];
				
			}

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $ans
			];

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

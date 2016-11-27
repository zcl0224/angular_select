<?php
	$type = $_POST["type"];

	if (isset($type)) {  

		// 保存数据
		if ($type == "save") {
			// 序号
			$num = $_POST["num"];
			// 书名
			$name = $_POST["name"];
			// 作者
			$author = $_POST["author"];
			//
			$show = $_POST['show'];

			$array = array("num" => $num,"name" => $name,"author" => $author,'show' => $show);
			// 获取json文件
			$json = file_get_contents("book.json");
			// 解码json文件
			$arr_json = json_decode($json,true);
			// 将数组加入到json中
			array_push($arr_json,$array);
			// 编码json文件
			$json = json_encode($arr_json);
			// 保存文件
			file_put_contents("book.json",$json);
			// 返回
			echo ($json);
		}
		
		// 删除数据
		if($type == "del"){
			$name = $_POST["name"];
			$json = file_get_contents("book.json");
			$arr_json = json_decode($json,true);
			for($i=0;$i<count($arr_json);$i++){
				if($arr_json[$i]["name"] == $name){
					array_splice($arr_json,$i,1);
					// 编码json文件
					$json = json_encode($arr_json);
					// 保存文件
					file_put_contents("book.json",$json);	
				}
			}
			echo json_encode($json);
		}
		// 修改数据
		if ($type == "change") {
			$num = $_POST["num"];
			$name = $_POST["name"];
			$author = $_POST["author"];
			$json = file_get_contents("book.json");
			$arr_json = json_decode($json,true);
			for($i=0;$i<count($arr_json);$i++){
				if($arr_json[$i]["num"] == $num){
					// 添加数据
					$arr_json[$i]['num'] = $num;
					$arr_json[$i]['name'] = $name;
					$arr_json[$i]['author'] = $author;
					$json = json_encode($arr_json);
					file_put_contents("book.json",$json);
					
				}
			}
			echo ($json);
		}
		// 遍历数据
		if ($type == 'checkAll') {
			$json = file_get_contents('book.json');
			echo ($json);
		}
	}









					
					




























?>
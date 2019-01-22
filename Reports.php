<?php

class Reports {

	//List
	//curl -l -X POST https://plagiarismsearch.com/api/v3/reports -u pedrito_lindo_alokado@hotmail.com:1dry51f48ve5gejlausd7ew-29365771 -d "limit=20"

	//Create
	//curl -l -X POST https://plagiarismsearch.com/api/v3/reports/create -u programacion@csweb.com.mx:nez4ot0vgkl0bhstb02f90n-32978001 -d "title=Tarea9&text=calando&language=es"

	//View
	//curl -l -X POST https://plagiarismsearch.com/api/v3/reports/{id} -u programacion@csweb.com.mx:nez4ot0vgkl0bhstb02f90n-32978001

	//Update
	//curl -l -X POST https://plagiarismsearch.com/api/v3/reports/update/1218348 -u programacion@csweb.com.mx:nez4ot0vgkl0bhstb02f90n-32978001 -d "report[title]=Bootstrap&report[notified]=1545249429&report[modified]=1545249429"

	public $apiUrl = 'https://plagiarismsearch.com/api/v3';
	public $apiUser;
	public $apiKey;

	public function __construct($apiUser, $apiKey) {
		$this->apiUser = $apiUser;
		$this->apiKey = $apiKey;
	}

	public function indexAction($params) {
		$url = $this->apiUrl . '/reports';
		return $this->post($url, $params);
	}

	public function createAction($params, $files = array()) {
		$url = $this->apiUrl . '/reports/create';
		return $this->post($url, $params, $files);
	}

	public function viewAction($id, $params = array()) {
		$url = $this->apiUrl . '/reports/view/' . $id;
		return $this->post($url, $params);
	}

	public function updateAction($id, $params = array()) {
		$url = $this->apiUrl . '/reports/update/' . $id;
		return $this->post($url, $params);
	}

	public function deleteAction($id, $params = array()) {
		$url = $this->apiUrl . '/reports/delete/' . $id;
		return $this->post($url, $params);
	}

	public function statusAction($id, $params = array()) {
		$url = $this->apiUrl . '/reports/status/' . $id;
		return $this->post($url, $params);
	}

	public function post($url, $params = array(), $files = array()) {
		$curl = curl_init($url);

		if($postFields = $this->buildPostFiles($params, $files) or $postFields = $this->buildPostToString($params)) {
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
		}

		// HTTP basic authentication
		curl_setopt($curl, CURLOPT_USERPWD, $this->apiUser . ':' . $this->apiKey);

		curl_setopt($curl, CURLOPT_HEADER, true);
		curl_setopt($curl, CURLOPT_VERBOSE, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);

		$data = curl_exec($curl);
		$info = curl_getinfo($curl);
		$content = substr($data, curl_getinfo($curl, CURLINFO_HEADER_SIZE));
		$error = curl_error($curl);
		curl_close($curl);

		if($error) {
			var_dump($error);
		}

		return $content;
	}

	private function buildPostToString($params) {
		if(!empty($params)) {
			if(is_array($params)) {
				return http_build_query($params, '', '&');
			} else {
				return $params;
			}
		}
		return false;
	}

	private function buildPostFiles($params, $files) {
		$result = array();
		if(!empty($params) and is_array($params)) {
			foreach($params as $key => $value) {
				if(is_array($value)) {
					$result[$key] = http_build_query($value, '', '&');
				} else {
					$result[$key] = $value;
				}
			}
		}
		if(!empty($files) and is_array($files)) {
			$result = array_merge($result, $this->buildFiles($files));
		}
		return $result;
	}

	private function buildFiles($files) {
		$result = array();
		if(!empty($files)) {
			foreach($files as $key => $value) {
				if(is_string($value)) {
					$result[$key] = new CURLFile(realpath($value));
				} else if(isset($value['tmp_name'])) {
					$file = $value['tmp_name'];
					$name = isset($value['name']) ? $value['name'] : null;
					$type = isset($value['type']) ? $value['type'] : null;

					$result[$key] = new CURLFile($file, $type, $name);
				}
			}
		}
		return $result;
	}

}
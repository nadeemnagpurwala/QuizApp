<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->view('home');
	}

	public function quizSelection() {
		$categoryId = $this->input->post('category');
		$difficultyLevel = $this->input->post('difficulty');
		echo $categoryId.'|'.$difficultyLevel;
	}

	public function getApiUrl($categoryId,$difficultyLevel) {

		$apiUrl = 'https://opentdb.com/api.php?amount=10&category='.''.$categoryId.'&difficulty='.$difficultyLevel.'&type=multiple';

		//Pagination
		$paginationData = $this->setPagination($apiUrl);
	}

	public function setPagination($apiUrl) {

		$pageNo = $this->input->get('page');

		if ($pageNo == '') { $pageNo = 1; }

		$limit = 10;
		$offset = ($pageNo * $limit) - $limit;

		$pageData = $this->getApiData($apiUrl);

		$totalPages = intval(count($pageData['results'])/$limit);

		$getApiData['apiResponse'] = array_slice($pageData['results'], $offset, $limit);
		$getApiData['questionNo'] = $offset;

		$row = $this->load->view('quiz',$getApiData, true);
        echo $row;
	}

	public function getApiData($apiUrl) {
		// Create a new cURL resource
        $curl = curl_init(); 

        // Set the file URL to fetch through cURL
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl,CURLOPT_HEADER, false); 

		$result=curl_exec($curl);

		curl_close($curl);
		
		$apiData = json_decode($result,true);

		return $apiData;
	}

	public function quizSubmit() {
		$correctAnswer = $this->input->get('getCorrectAnswer');
		$submittedAnswer = md5($this->input->get('getUserAnswer'));
		
		if ($correctAnswer == $submittedAnswer) {
			echo "Correct";
		}

		else {
			echo "Incorrect";
		}
	}
}

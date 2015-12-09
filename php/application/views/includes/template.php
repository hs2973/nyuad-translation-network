<?php
	$this->load->model('articles_model');
	$data['new_submissions_count'] = $this->articles_model->count_articles(array('is_approved' => '0'));
?>
<?php $this->load->view('includes/header', $data); ?>

<?php $this->load->view($main_content); ?>

<?php $this->load->view('includes/footer'); ?>
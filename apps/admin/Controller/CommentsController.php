<?php
class CommentsController extends AppController {
	public $helpers = array('Html', 'Form');

	public function add() {
		if($this->request->is('post')) {
			if ($this->Comment->save($this->request->data)) {

				$this->Session->setFlash('Success');
				$this->redirect(array('controller' => 'posts', 'action'=>'view', $this->data['Comment']['post_id']));
			} else {
				$this->Session->setFlash('failed');
			}
		}
	}

	public function edit($id = null) {
		$this->Post->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Post->read();
		} else {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('success');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('failed');
			}
		}
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->request->is('ajax')) {
			if ($this->Comment->delete($id)) {
				$this->autoRender = false;
				$this->autoLayout = false;
				$response = array('id' => $id);
				$this->header('Content-Type: application/json');
				echo json_encode($response);
				exit();
			}
			$this->redirect(array('controller' => 'posts' ,'action' => 'index'));
		}
		/*
		if ($this->Post->delete($id)) {
			$this->Session->setFlash('Deleted');
			$this->redirect(array('action'=>'index'));
		}
		*/
	}
}


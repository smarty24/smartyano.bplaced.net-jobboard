<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Posters Controller
 *
 * @property \App\Model\Table\PostersTable $Posters
 *
 * @method \App\Model\Entity\Poster[] paginate($object = null, array $settings = [])
 */
class PostersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //connect this line to use this method
        return $this->redirect(['controller' => 'Jobs','action' => 'index']);
        $posters = $this->paginate($this->Posters);

        $this->set(compact('posters'));
        $this->set('_serialize', ['posters']);
    }

    /**
     * View method
     *
     * @param string|null $id Poster id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //connect this line to use this method
        return $this->redirect(['controller' => 'Jobs','action' => 'index']);
        $poster = $this->Posters->get($id, [
            'contain' => []
        ]);

        $this->set('poster', $poster);
        $this->set('_serialize', ['poster']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //connect this line to use this method
        return $this->redirect(['controller' => 'Jobs','action' => 'index']);
        $poster = $this->Posters->newEntity();
        if ($this->request->is('post')) {
            $poster = $this->Posters->patchEntity($poster, $this->request->getData());
            if ($this->Posters->save($poster)) {
                $this->Flash->success(__('The poster has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poster could not be saved. Please, try again.'));
        }
        $this->set(compact('poster'));
        $this->set('_serialize', ['poster']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Poster id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //connect this line to use this method
        return $this->redirect(['controller' => 'Jobs','action' => 'index']);
        $poster = $this->Posters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poster = $this->Posters->patchEntity($poster, $this->request->getData());
            if ($this->Posters->save($poster)) {
                $this->Flash->success(__('The poster has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poster could not be saved. Please, try again.'));
        }
        $this->set(compact('poster'));
        $this->set('_serialize', ['poster']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Poster id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // return $this->redirect(['controller' => 'Jobs','action' => 'index']);
        $this->request->allowMethod(['post', 'delete']);
        $poster = $this->Posters->get($id);
        if ($this->Posters->delete($poster)) {
            $this->Flash->success(__('The poster has been deleted.'));
        } else {
            $this->Flash->error(__('The poster could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

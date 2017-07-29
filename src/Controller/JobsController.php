<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Network\Exception\NotFoundException;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 *
 * @method \App\Model\Entity\Job[] paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{

    public function initialize(){

        // initial parent controller AppController
        parent::initialize();
        $this->loadComponent('Flash'); //Include the FlashComponent
        $this->loadComponent('Csrf'); //Include the TokenComponent
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       /* $this->paginate = [
            'contain' => ['Jobs'] ];*/

        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs'));
        $this->set('_serialize', ['jobs']);

        // Default page that loads all posted jobs
        $this->set('jobs', $this->Jobs->find('all', array('order' => 'posted DESC')
            ));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // $job = $this->Jobs->get($id);
        $job = $this->Jobs->findById($id)->first();
        if (empty($job)) {
            $this->Flash->error(__('The job could not be found'));
            return $this->redirect(['action' => 'index']);
        }

        // $this->set(compact('job'));
        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
       
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());

                if ($this->Jobs->save($job)) {
                    $this->Flash->success(__('The job '. $job->title .' has been saved.'));

                    //send email notification with link
                    $email = new Email('default');
                    $email->from(['webmaster@localhost' => 'JobBoard Portal'])
                    ->emailFormat('html')
                    ->to($job->poster->email)
                    ->subject('Welcome to JobBoard')
                    ->send(
                            "Thank you {$job->poster->name} for the registration and posting your job on our site. The Job \"{$job->title}\" has been posted! <br><br> You can use the link below to edit and delete job offer: <br><br> 
                            <a href=\"http://smartyano.bplaced.net/jobboard/jobs/edit/{$job->id}?token={$job->token}\" target=\"_blank\">
                                http://smartyano.bplaced.net/jobboard/jobs/edit/{$job->id}?token={$job->token}
                            </a>" 
                        );
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }

        $jobs = $this->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('job', 'jobs'));
        $this->set('_serialize', ['job']);
        $this->set('job', $job);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        // check if token is set in the url and match
        if (!isset($_GET['token']) || $_GET['token'] !== $job->token ){

            $this->Flash->error(__('The requested job link cannot be found!'));
            return $this->redirect(['action' => 'index']);

        } else {
            if ($this->request->is(['patch', 'post', 'put'])) {

                $job = $this->Jobs->patchEntity($job, $this->request->getData());
                if ($this->Jobs->save($job)) {
                    $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
    }
        $jobs = $this->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('job', 'jobs'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

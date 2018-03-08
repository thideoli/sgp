<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractRestfulController
{

    private $leads;

    public function __construct()
    {
        $this->leads = [
            [
                'id' => 1,'name' => 'Batman',
                'email' => 'thebatman@wayneenterprises.com',
                'city' => 'Gotham City', 'source' => 'Facebook ad campaign',
                'created' => '2017-05-23'
            ],
            [
                'id' => 2, 'name' => 'Superman',
                'email' => 'ckent@dailyplanet.com',
                'city' => 'Metropolis', 'source' => 'Newspaper ad campaign',
                'created' => '2016-01-15'
            ]
        ];
    }

    public function getList()
    {
        return new JsonModel([
            'leads' => $this->leads
        ]);
    }

    public function get($id)
    {

    }

    public function create($data)
    {

    }

    public function update($id, $data)
    {

    }

    public function delete($id)
    {

    }

}

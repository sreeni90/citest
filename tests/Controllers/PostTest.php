<?php

namespace Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Test\FeatureTestCase;

class PostTest extends FeatureTestCase
{
    public function testCreateWithValidRequest()
    {
        $result = $this->post('post', [
            'title' => 'Test Post',
            'author' => 'Sreeni',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. '
        ]);
        $result->assertStatus(ResponseInterface::HTTP_CREATED);
    }

    public function testIndex()
    {
        $result = $this->get('posts');
        $result->assertStatus(ResponseInterface::HTTP_OK);
    }

    public function testShowWithInvalidId()
    {
        $result = $this->get('post/0'); //no item in the database should have an id of -1
        $result->assertStatus(ResponseInterface::HTTP_NOT_FOUND);
    }
}

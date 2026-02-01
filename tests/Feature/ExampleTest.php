<?php

test('the application returns a successful response', function () {
    $response = $this->get('/h');

    $response->assertStatus(200);
});

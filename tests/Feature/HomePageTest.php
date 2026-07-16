<?php

it('serves the React application shell', function (): void {
    $this->get('/')
        ->assertOk()
        ->assertSee('id="app"', false);
});

it('exposes the framework health endpoint', function (): void {
    $this->get('/up')->assertOk();
});

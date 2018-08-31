<?php
use \Codeception\Util\HttpCode;

class CustomRestRouteCest {

	public function _before(FunctionalTester $I ) {
		$I->am('user');
	}
	/**
	 * @test
	 * it should access custom endpoint
	 */
	public function it_should_access_custom_endpoint( FunctionalTester $I ) {
		$I->wantTo('access on the custom endpoint');
		$I->sendAjaxGetRequest( '/wp-json/v2/calc' );
		$I->seeResponseCodeIs(HttpCode::OK); // 200
		$I->seeResponseIsJson();
		$I->seeResponseMatchesJsonType([
			'result' => '11',
		]);
	}

}

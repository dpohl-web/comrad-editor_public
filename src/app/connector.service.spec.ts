import { TestBed } from '@angular/core/testing';

import { HeroesService } from './connector.service';

describe('ConnectorService', () => {
	beforeEach(() => TestBed.configureTestingModule({}));

	it('should be created', () => {
		const service: HeroesService = TestBed.inject(HeroesService);
		expect(service).toBeTruthy();
	});
});

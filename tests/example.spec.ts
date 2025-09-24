import { test, expect } from '@playwright/test';

test('basic test', async ({ page }) => {
  await page.goto('/');
  const title = await page.title();
  expect(title).toBe('QuestionnaireForm');

  const element = page.locator('.mat-expansion-panel:nth-child(1)');
    await element.click();

    const button = page.locator('.mat-radio-group .mat-radio-button:nth-child(2)');
    await button.click();

});

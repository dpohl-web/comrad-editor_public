import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
    await page.goto('http://localhost:4200/home');
    await page.getByRole('button', { name: 'General General infos' }).click();
    await page.getByText('Edit an existing questionnaire').click();
    await page.getByRole('combobox', { name: 'Number' }).click();
    await page.getByRole('combobox', { name: 'Number' }).fill('test22');
    await page.getByText('test22', { exact: true }).click();
    await page.getByRole('button', { name: 'Main All questions & answers' }).click();
    await page.waitForTimeout(5000);
    await page.pause();
    const categoryLocator = page.locator('mat-expansion-panel-header >> text=Category');
    // Warten, bis das Element sichtbar ist
    await categoryLocator.waitFor({ state: 'visible', timeout: 15000 });
    await categoryLocator.click();
    await page.waitForTimeout(10000);
});
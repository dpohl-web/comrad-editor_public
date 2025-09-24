import { inject } from '@angular/core';
import { CanDeactivateFn } from '@angular/router';
import { ComponentCanDeactivate } from './component-can-deactivate';

export const canDeactivateGuard: CanDeactivateFn<ComponentCanDeactivate> = (
  component,
  currentRoute,
  currentState,
  nextState
) => {
  if (!component.canDeactivate()) {
    return confirm('You have unsaved changes! If you leave, your changes will be lost.');
  }
  return true;
};
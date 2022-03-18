import { runIfFunction } from '../../utils.js'
import { getPopup } from '../getters.js'
import { renderActions } from './renderActions.js'
import { renderContainer } from './renderContainer.js'
import { renderContent } from './renderContent.js'
import { renderFooter } from './renderFooter.js'
import { renderCloseButton } from './renderCloseButton.js'
import { renderIcon } from './renderIcon.js'
import { renderImage } from './renderImage.js'
import { renderProgressSteps } from './renderProgressSteps.js'
import { renderTitle } from './renderTitle.js'
import { renderPopup } from './renderPopup.js'

export const render = (instance, params) => {
  renderPopup(instance, params)
  renderContainer(instance, params)

  renderProgressSteps(instance, params)
  renderIcon(instance, params)
  renderImage(instance, params)
  renderTitle(instance, params)
  renderCloseButton(instance, params)

  renderContent(instance, params)
  renderActions(instance, params)
  renderFooter(instance, params)

  runIfFunction(params.didRender, getPopup())
}

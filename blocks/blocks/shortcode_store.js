import apiFetch from '@wordpress/api-fetch'
import { registerStore } from '@wordpress/data'

const DEFAULT_STATE = {
  shortcodeList: {}
}
const STORE_NAME = 'btcpaywall/shortcode_data'
const actions = {
  setShortcodeList (shortcodeList) {
    return {
      type: 'SET_SHORTCODE_LIST',
      shortcodeList
    }
  },
  getShortcodeList (path) {
    return {
      type: 'GET_SHORTCODE_LIST',
      path
    }
  }
}
const reducer = (state = DEFAULT_STATE, action) => {
  switch (action.type) {
    case 'SET_SHORTCODE_LIST': {
      return {
        ...state,
        shortcodeList: action.shortcodeList
      }
    }
    default: {
      return state
    }
  }
}
const selectors = {
  getShortcodeList (state) {
    const { shortcodeList } = state
    return shortcodeList
  }
}
const controls = {
  GET_SHORTCODE_LIST (action) {
    return apiFetch({ path: action.path })
  }
}
const resolvers = {
  * getShortcodeList () {
    const shortcodeList = yield actions.getShortcodeList(
      '/btcpaywall/v1/shortcode-list'
    )
    return actions.setShortcodeList(shortcodeList)
  }
}
const storeConfig = {
  reducer,
  controls,
  selectors,
  resolvers,
  actions
}
registerStore(STORE_NAME, storeConfig)
export { STORE_NAME }

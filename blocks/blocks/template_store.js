import apiFetch from "@wordpress/api-fetch";
import { createReduxStore, register } from "@wordpress/data";

const DEFAULT_STATE = {
  donationTemplateList: {},
  payPerPostTemplateList: {},
  payPerViewTemplateList: {},
};
const STORE_NAME = "btcpaywall/shortcode_data";
const actions = {
  setDonationTemplateList(donationList) {
    return {
      type: "SET_DONATION_TEMPLATE_LIST",
      donationList,
    };
  },
  getDonationTemplateList(path) {
    return {
      type: "GET_DONATION_TEMPLATE_LIST",
      path,
    };
  },
  setPayPerPostTemplateList(payPerPostList) {
    return {
      type: "SET_PAY_PER_POST_TEMPLATE_LIST",
      payPerPostList,
    };
  },
  getPayPerPostTemplateList(path) {
    return {
      type: "GET_PAY_PER_POST_TEMPLATE_LIST",
      path,
    };
  },
  setPayPerViewTemplateList(payPerViewList) {
    return {
      type: "SET_PAY_PER_VIEW_TEMPLATE_LIST",
      payPerViewList,
    };
  },
  getPayPerViewTemplateList(path) {
    return {
      type: "GET_PAY_PER_VIEW_TEMPLATE_LIST",
      path,
    };
  },
};
const store = createReduxStore(STORE_NAME, {
  reducer(state = DEFAULT_STATE, action) {
    switch (action.type) {
      case "SET_DONATION_TEMPLATE_LIST": {
        return {
          ...state,
          donationTemplateList: {
            ...state.donationTemplateList,
            ...action.donationList,
          },
        };
      }
      case "SET_PAY_PER_POST_TEMPLATE_LIST": {
        return {
          ...state,
          payPerPostTemplateList: {
            ...state.payPerPostTemplateList,
            ...action.payPerPostList,
          },
        };
      }
      case "SET_PAY_PER_VIEW_TEMPLATE_LIST": {
        return {
          ...state,
          payPerViewTemplateList: {
            ...state.payPerViewTemplateList,
            ...action.payPerViewList,
          },
        };
      }
      default: {
        return state;
      }
    }
  },
  selectors: {
    getDonationTemplateList(state) {
      const { donationTemplateList } = state;
      return donationTemplateList;
    },
    getPayPerPostTemplateList(state) {
      const { payPerPostTemplateList } = state;
      return payPerPostTemplateList;
    },
    getPayPerViewTemplateList(state) {
      const { payPerViewTemplateList } = state;
      return payPerViewTemplateList;
    },
  },
  controls: {
    GET_DONATION_TEMPLATE_LIST(action) {
      return apiFetch({ path: action.path });
    },
    GET_PAY_PER_POST_TEMPLATE_LIST(action) {
      return apiFetch({ path: action.path });
    },
    GET_PAY_PER_VIEW_TEMPLATE_LIST(action) {
      return apiFetch({ path: action.path });
    },
  },
  actions,
  resolvers: {
    *getDonationTemplateList() {
      const donationList = yield actions.getDonationTemplateList(
        "/btcpaywall/v1/donation-templates"
      );
      return actions.setDonationTemplateList(donationList);
    },
    *getPayPerPostTemplateList() {
      const payPerPostList = yield actions.getPayPerPostTemplateList(
        "/btcpaywall/v1/pay-per-post-templates"
      );
      return actions.setPayPerPostTemplateList(payPerPostList);
    },
    *getPayPerViewTemplateList() {
      const payPerViewList = yield actions.getPayPerViewTemplateList(
        "/btcpaywall/v1/pay-per-view-templates"
      );
      return actions.setPayPerViewTemplateList(payPerViewList);
    },
  },
});
//   const storeConfig = {
//   reducer,
//   controls,
//   selectors,
//   resolvers,
//   actions,
// };
register(store);
export { STORE_NAME };

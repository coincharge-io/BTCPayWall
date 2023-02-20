import apiFetch from "@wordpress/api-fetch";
import { createReduxStore, register } from "@wordpress/data";

const DEFAULT_STATE = {
  donationTemplateList: {},
  payPerTemplateList: {},
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
  setPayPerTemplateList(payPerList) {
    return {
      type: "SET_PAY_PER_TEMPLATE_LIST",
      payPerList,
    };
  },
  getPayPerTemplateList(path) {
    return {
      type: "GET_PAY_PER_TEMPLATE_LIST",
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
      case "SET_PAY_PER_TEMPLATE_LIST": {
        return {
          ...state,
          payPerTemplateList: {
            ...state.payPerTemplateList,
            ...action.payPerList,
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
    getPayPerTemplateList(state) {
      const { payPerTemplateList } = state;
      return payPerTemplateList;
    },
  },
  controls: {
    GET_DONATION_TEMPLATE_LIST(action) {
      return apiFetch({ path: action.path });
    },
    GET_PAY_PER_TEMPLATE_LIST(action) {
      return apiFetch({ path: action.path });
    },
  },
  actions,
  resolvers: {
    *getDonationTemplateList() {
      const donationList = yield actions.getDonationTemplateList(
        "/btcpaywall/v1/donation-templates"
      );
      console.log(donationList);
      return actions.setDonationTemplateList(donationList);
    },
    *getPayPerTemplateList() {
      const payPerList = yield actions.getPayPerTemplateList(
        "/btcpaywall/v1/pay-per-templates"
      );
      // let prepareTemplate = {};
      // payPerList.forEach((template) => {
      //   prepareTemplate[`#${template.id}-${template.name}`] =
      //     Object.values(template);
      // });
      console.log(payPerList);
      return actions.setPayPerTemplateList(payPerList);
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

(()=>{var e={3849:(e,r)=>{var t;!function(){"use strict";var n={}.hasOwnProperty;function o(){for(var e=[],r=0;r<arguments.length;r++){var t=arguments[r];if(t){var c=typeof t;if("string"===c||"number"===c)e.push(t);else if(Array.isArray(t)){if(t.length){var i=o.apply(null,t);i&&e.push(i)}}else if("object"===c)if(t.toString===Object.prototype.toString)for(var a in t)n.call(t,a)&&t[a]&&e.push(a);else e.push(t.toString())}}return e.join(" ")}e.exports?(o.default=o,e.exports=o):void 0===(t=function(){return o}.apply(r,[]))||(e.exports=t)}()},8406:()=>{},1753:()=>{},2728:()=>{},6099:()=>{},7507:()=>{},9432:()=>{}},r={};function t(n){var o=r[n];if(void 0!==o)return o.exports;var c=r[n]={exports:{}};return e[n](c,c.exports,t),c.exports}t.n=e=>{var r=e&&e.__esModule?()=>e.default:()=>e;return t.d(r,{a:r}),r},t.d=(e,r)=>{for(var n in r)t.o(r,n)&&!t.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:r[n]})},t.o=(e,r)=>Object.prototype.hasOwnProperty.call(e,r),(()=>{"use strict";const e=window.React,r=window.wp.element;function n(e){return n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},n(e)}const o=window.wp.i18n,c=window.wc.wcSettings;var i,a,l,s,u,p,m,d,f,b;const g=(0,c.getSetting)("wcBlocksConfig",{buildPhase:1,pluginUrl:"",productCount:0,defaultAvatar:"",restApiRoutes:{},wordCountType:"words"}),w=g.pluginUrl+"assets/images/",_=(g.pluginUrl,g.buildPhase,null===(i=c.STORE_PAGES.shop)||void 0===i||i.permalink,null===(a=c.STORE_PAGES.checkout)||void 0===a||a.id,null===(l=c.STORE_PAGES.checkout)||void 0===l||l.permalink,null===(s=c.STORE_PAGES.privacy)||void 0===s||s.permalink,null===(u=c.STORE_PAGES.privacy)||void 0===u||u.title,null===(p=c.STORE_PAGES.terms)||void 0===p||p.permalink,null===(m=c.STORE_PAGES.terms)||void 0===m||m.title,null===(d=c.STORE_PAGES.cart)||void 0===d||d.id,null===(f=c.STORE_PAGES.cart)||void 0===f||f.permalink,null!==(b=c.STORE_PAGES.myaccount)&&void 0!==b&&b.permalink?c.STORE_PAGES.myaccount.permalink:(0,c.getSetting)("wpLoginUrl","Signin/index.html"),(0,c.getSetting)("localPickupEnabled",!1),(0,c.getSetting)("countries",{})),y=(0,c.getSetting)("countryData",{}),E=(Object.fromEntries(Object.keys(y).filter((e=>!0===y[e].allowBilling)).map((e=>[e,_[e]||""]))),Object.fromEntries(Object.keys(y).filter((e=>!0===y[e].allowBilling)).map((e=>[e,y[e].states||[]]))),Object.fromEntries(Object.keys(y).filter((e=>!0===y[e].allowShipping)).map((e=>[e,_[e]||""]))),Object.fromEntries(Object.keys(y).filter((e=>!0===y[e].allowShipping)).map((e=>[e,y[e].states||[]]))),Object.fromEntries(Object.keys(y).map((e=>[e,y[e].locale||[]]))),{address:["first_name","last_name","company","address_1","address_2","city","postcode","country","state","phone"],contact:["email"],additional:[]}),v=((0,c.getSetting)("addressFieldsLocations",E).address,(0,c.getSetting)("addressFieldsLocations",E).contact,(0,c.getSetting)("addressFieldsLocations",E).additional,({imageUrl:r=`${w}/block-error.svg`,header:t=(0,o.__)("Oops!","woocommerce"),text:n=(0,o.__)("There was an error loading the content.","woocommerce"),errorMessage:c,errorMessagePrefix:i=(0,o.__)("Error:","woocommerce"),button:a,showErrorBlock:l=!0})=>l?(0,e.createElement)("div",{className:"wc-block-error wc-block-components-error"},r&&(0,e.createElement)("img",{className:"wc-block-error__image wc-block-components-error__image",src:r,alt:""}),(0,e.createElement)("div",{className:"wc-block-error__content wc-block-components-error__content"},t&&(0,e.createElement)("p",{className:"wc-block-error__header wc-block-components-error__header"},t),n&&(0,e.createElement)("p",{className:"wc-block-error__text wc-block-components-error__text"},n),c&&(0,e.createElement)("p",{className:"wc-block-error__message wc-block-components-error__message"},i?i+" ":"",c),a&&(0,e.createElement)("p",{className:"wc-block-error__button wc-block-components-error__button"},a))):null);t(8406);class h extends r.Component{constructor(...e){var r,t,o;super(...e),r=this,o={errorMessage:"",hasError:!1},(t=function(e){var r=function(e,r){if("object"!==n(e)||null===e)return e;var t=e[Symbol.toPrimitive];if(void 0!==t){var o=t.call(e,"string");if("object"!==n(o))return o;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(e);return"symbol"===n(r)?r:String(r)}(t="state"))in r?Object.defineProperty(r,t,{value:o,enumerable:!0,configurable:!0,writable:!0}):r[t]=o}static getDerivedStateFromError(r){return void 0!==r.statusText&&void 0!==r.status?{errorMessage:(0,e.createElement)(e.Fragment,null,(0,e.createElement)("strong",null,r.status),": ",r.statusText),hasError:!0}:{errorMessage:r.message,hasError:!0}}render(){const{header:r,imageUrl:t,showErrorMessage:n=!0,showErrorBlock:o=!0,text:c,errorMessagePrefix:i,renderError:a,button:l}=this.props,{errorMessage:s,hasError:u}=this.state;return u?"function"==typeof a?a({errorMessage:s}):(0,e.createElement)(v,{showErrorBlock:o,errorMessage:n?s:null,header:r,imageUrl:t,text:c,errorMessagePrefix:i,button:l}):this.props.children}}const k=h,S=[".wp-block-woocommerce-cart"],x=({Block:t,containers:n,getProps:o=(()=>({})),getErrorBoundaryProps:c=(()=>({}))})=>{0!==n.length&&Array.prototype.forEach.call(n,((n,i)=>{const a=o(n,i),l=c(n,i),s={...n.dataset,...a.attributes||{}};(({Block:t,container:n,attributes:o={},props:c={},errorBoundaryProps:i={}})=>{(0,r.render)((0,e.createElement)(k,{...i},(0,e.createElement)(r.Suspense,{fallback:(0,e.createElement)("div",{className:"wc-block-placeholder"})},t&&(0,e.createElement)(t,{...c,attributes:o}))),n,(()=>{n.classList&&n.classList.remove("is-loading")}))})({Block:t,container:n,props:a,attributes:s,errorBoundaryProps:l})}))};function P(e,t){const n=(0,r.useRef)();return(0,r.useEffect)((()=>{n.current===e||t&&!t(e,n.current)||(n.current=e)}),[e,t]),n.current}const C=window.wc.wcBlocksData,F=window.wp.data,R=window.wp.isShallowEqual;var A=t.n(R);const N=(0,r.createContext)("page"),O=()=>(0,r.useContext)(N),T=(N.Provider,e=>{const t=O();e=e||t;const n=(0,F.useSelect)((r=>r(C.QUERY_STATE_STORE_KEY).getValueForQueryContext(e,void 0)),[e]),{setValueForQueryContext:o}=(0,F.useDispatch)(C.QUERY_STATE_STORE_KEY);return[n,(0,r.useCallback)((r=>{o(e,r)}),[e,o])]}),B=(e,t,n)=>{const o=O();n=n||o;const c=(0,F.useSelect)((r=>r(C.QUERY_STATE_STORE_KEY).getValueForQueryKey(n,e,t)),[n,e]),{setQueryValue:i}=(0,F.useDispatch)(C.QUERY_STATE_STORE_KEY);return[c,(0,r.useCallback)((r=>{i(n,e,r)}),[n,e,i])]};function U(r,t,n){var o=this,c=(0,e.useRef)(null),i=(0,e.useRef)(0),a=(0,e.useRef)(null),l=(0,e.useRef)([]),s=(0,e.useRef)(),u=(0,e.useRef)(),p=(0,e.useRef)(r),m=(0,e.useRef)(!0);(0,e.useEffect)((function(){p.current=r}),[r]);var d=!t&&0!==t&&"undefined"!=typeof window;if("function"!=typeof r)throw new TypeError("Expected a function");t=+t||0;var f=!!(n=n||{}).leading,b=!("trailing"in n)||!!n.trailing,g="maxWait"in n,w=g?Math.max(+n.maxWait||0,t):null;(0,e.useEffect)((function(){return m.current=!0,function(){m.current=!1}}),[]);var _=(0,e.useMemo)((function(){var e=function(e){var r=l.current,t=s.current;return l.current=s.current=null,i.current=e,u.current=p.current.apply(t,r)},r=function(e,r){d&&cancelAnimationFrame(a.current),a.current=d?requestAnimationFrame(e):setTimeout(e,r)},n=function(e){if(!m.current)return!1;var r=e-c.current;return!c.current||r>=t||r<0||g&&e-i.current>=w},_=function(r){return a.current=null,b&&l.current?e(r):(l.current=s.current=null,u.current)},y=function e(){var o=Date.now();if(n(o))return _(o);if(m.current){var a=t-(o-c.current),l=g?Math.min(a,w-(o-i.current)):a;r(e,l)}},E=function(){var p=Date.now(),d=n(p);if(l.current=[].slice.call(arguments),s.current=o,c.current=p,d){if(!a.current&&m.current)return i.current=c.current,r(y,t),f?e(c.current):u.current;if(g)return r(y,t),e(c.current)}return a.current||r(y,t),u.current};return E.cancel=function(){a.current&&(d?cancelAnimationFrame(a.current):clearTimeout(a.current)),i.current=0,l.current=c.current=s.current=a.current=null},E.isPending=function(){return!!a.current},E.flush=function(){return a.current?_(Date.now()):u.current},E}),[f,g,t,w,b,d]);return _}function L(e,r){return e===r}function M(e){return"function"==typeof e?function(){return e}:e}const j=e=>!(e=>null===e)(e)&&e instanceof Object&&e.constructor===Object;function I(e,r){return j(e)&&r in e}var q=function(e){return function(r,t,n){return e(r,t,n)*n}},D=function(e,r){if(e)throw Error("Invalid sort config: "+r)},G=function(e){var r=e||{},t=r.asc,n=r.desc,o=t?1:-1,c=t||n;return D(!c,"Expected `asc` or `desc` property"),D(t&&n,"Ambiguous object with `asc` and `desc` config properties"),{order:o,sortBy:c,comparer:e.comparer&&q(e.comparer)}};function Q(e,r,t){if(void 0===e||!0===e)return function(e,n){return r(e,n,t)};if("string"==typeof e)return D(e.includes("."),"String syntax not allowed for nested properties."),function(n,o){return r(n[e],o[e],t)};if("function"==typeof e)return function(n,o){return r(e(n),e(o),t)};if(Array.isArray(e)){var n=function(e){return function r(t,n,o,c,i,a,l){var s,u;if("string"==typeof t)s=a[t],u=l[t];else{if("function"!=typeof t){var p=G(t);return r(p.sortBy,n,o,p.order,p.comparer||e,a,l)}s=t(a),u=t(l)}var m=i(s,u,c);return(0===m||null==s&&null==u)&&n.length>o?r(n[o],n,o+1,c,i,a,l):m}}(r);return function(o,c){return n(e[0],e,1,t,r,o,c)}}var o=G(e);return Q(o.sortBy,o.comparer||r,o.order)}var V=function(e,r,t,n){return Array.isArray(r)?(Array.isArray(t)&&t.length<2&&(t=t[0]),r.sort(Q(t,n,e))):r};function Y(e){var r=q(e.comparer);return function(t){var n=Array.isArray(t)&&!e.inPlaceSorting?t.slice():t;return{asc:function(e){return V(1,n,e,r)},desc:function(e){return V(-1,n,e,r)},by:function(e){return V(1,n,e,r)}}}}var W=function(e,r,t){return null==e?t:null==r?-t:typeof e!=typeof r?typeof e<typeof r?-1:1:e<r?-1:e>r?1:0},K=Y({comparer:W});function $(e){const t=(0,r.useRef)(e);return A()(e,t.current)||(t.current=e),t.current}Y({comparer:W,inPlaceSorting:!0});const z=({queryAttribute:t,queryPrices:n,queryStock:o,queryRating:c,queryState:i,isEditor:a=!1})=>{let l=O();l=`${l}-collection-data`;const[s]=T(l),[u,p]=B("calculate_attribute_counts",[],l),[m,d]=B("calculate_price_range",null,l),[f,b]=B("calculate_stock_status_counts",null,l),[g,w]=B("calculate_rating_counts",null,l),_=$(t||{}),y=$(n),E=$(o),v=$(c);(0,r.useEffect)((()=>{"object"==typeof _&&Object.keys(_).length&&(u.find((e=>I(_,"taxonomy")&&e.taxonomy===_.taxonomy))||p([...u,_]))}),[_,u,p]),(0,r.useEffect)((()=>{m!==y&&void 0!==y&&d(y)}),[y,d,m]),(0,r.useEffect)((()=>{f!==E&&void 0!==E&&b(E)}),[E,b,f]),(0,r.useEffect)((()=>{g!==v&&void 0!==v&&w(v)}),[v,w,g]);const[h,k]=(0,r.useState)(a),[S]=(x=h,N=L,R=(0,e.useState)(M(x)),A=R[1],j=[R[0],(0,e.useCallback)((function(e){return A(M(e))}),[])],q=j[0],D=j[1],G=U((0,e.useCallback)((function(e){return D(e)}),[D]),200,P),Q=(0,e.useRef)(x),N(Q.current,x)||(G(x),Q.current=x),[q,G]);var x,P,R,A,N,j,q,D,G,Q;h||k(!0);const V=(0,r.useMemo)((()=>(e=>{const r=e;return Array.isArray(e.calculate_attribute_counts)&&(r.calculate_attribute_counts=K(e.calculate_attribute_counts.map((({taxonomy:e,queryType:r})=>({taxonomy:e,query_type:r})))).asc(["taxonomy","query_type"])),r})(s)),[s]);return(e=>{const{namespace:t,resourceName:n,resourceValues:o=[],query:c={},shouldSelect:i=!0}=e;if(!t||!n)throw new Error("The options object must have valid values for the namespace and the resource properties.");const a=(0,r.useRef)({results:[],isLoading:!0}),l=$(c),s=$(o),u=(()=>{const[,e]=(0,r.useState)();return(0,r.useCallback)((r=>{e((()=>{throw r}))}),[])})(),p=(0,F.useSelect)((e=>{if(!i)return null;const r=e(C.COLLECTIONS_STORE_KEY),o=[t,n,l,s],c=r.getCollectionError(...o);if(c){if(!(c instanceof Error))throw new Error("TypeError: `error` object is not an instance of Error constructor");u(c)}return{results:r.getCollection(...o),isLoading:!r.hasFinishedResolution("getCollection",o)}}),[t,n,s,l,i]);return null!==p&&(a.current=p),a.current})({namespace:"/wc/store/v1",resourceName:"products/collection-data",query:{...i,page:void 0,per_page:void 0,orderby:void 0,order:void 0,...V},shouldSelect:S})};var Z=t(3849),J=t.n(Z);const X=window.wc.blocksComponents;t(7507);const H=(e,r,t,n=1,o=!1)=>{let[c,i]=e;const a=e=>Number.isFinite(e);return a(c)||(c=r||0),a(i)||(i=t||n),a(r)&&r>c&&(c=r),a(t)&&t<=c&&(c=t-n),a(r)&&r>=i&&(i=r+n),a(t)&&t<i&&(i=t),!o&&c>=i&&(c=i-n),o&&i<=c&&(i=c+n),[c,i]};t(6099);const ee=({className:r,isLoading:t,disabled:n,
/* translators: Submit button text for filters. */
label:c=(0,o.__)("Apply","woocommerce"),onClick:i,screenReaderLabel:a=(0,o.__)("Apply filter","woocommerce")})=>(0,e.createElement)("button",{type:"submit",className:J()("wp-block-button__link","wc-block-filter-submit-button","wc-block-components-filter-submit-button",{"is-loading":t},r),disabled:n,onClick:i},(0,e.createElement)(X.Label,{label:c,screenReaderLabel:a})),re=({maxConstraint:e,minorUnit:r})=>({floatValue:t})=>void 0!==t&&t<=e/10**r&&t>0,te=({minConstraint:e,currentMaxValue:r,minorUnit:t})=>({floatValue:n})=>void 0!==n&&n>=e/10**t&&n<r/10**t;t(2728);const ne=({className:r,
/* translators: Reset button text for filters. */
label:t=(0,o.__)("Reset","woocommerce"),onClick:n,screenReaderLabel:c=(0,o.__)("Reset filter","woocommerce")})=>(0,e.createElement)("button",{className:J()("wc-block-components-filter-reset-button",r),onClick:n},(0,e.createElement)(X.Label,{label:t,screenReaderLabel:c})),oe=({minPrice:t,maxPrice:n,minConstraint:c,maxConstraint:i,onChange:a,step:l,currency:s,showInputFields:u=!0,showFilterButton:p=!1,inlineInput:m=!0,isLoading:d=!1,isUpdating:f=!1,isEditor:b=!1,onSubmit:g=(()=>{})})=>{const w=(0,r.useRef)(null),_=(0,r.useRef)(null),y=l||10**s.minorUnit,[E,v]=(0,r.useState)(t),[h,k]=(0,r.useState)(n),S=(0,r.useRef)(null),[x,P]=(0,r.useState)(0);(0,r.useEffect)((()=>{v(t)}),[t]),(0,r.useEffect)((()=>{k(n)}),[n]),(0,r.useLayoutEffect)((()=>{var e;m&&S.current&&P(null===(e=S.current)||void 0===e?void 0:e.offsetWidth)}),[m,P]);const C=(0,r.useMemo)((()=>isFinite(c)&&isFinite(i)),[c,i]),F=(0,r.useMemo)((()=>isFinite(t)&&isFinite(n)&&C?{"--low":(t-c)/(i-c)*100+"%","--high":(n-c)/(i-c)*100+"%"}:{"--low":"0%","--high":"100%"}),[t,n,c,i,C]),R=(0,r.useCallback)((e=>{if(d||!C||!w.current||!_.current)return;const r=e.target.getBoundingClientRect(),t=e.clientX-r.left,n=w.current.offsetWidth,o=+w.current.value,c=_.current.offsetWidth,a=+_.current.value,l=n*(o/i),s=c*(a/i);Math.abs(t-l)>Math.abs(t-s)?(w.current.style.zIndex="20",_.current.style.zIndex="21"):(w.current.style.zIndex="21",_.current.style.zIndex="20")}),[d,i,C]),A=(0,r.useCallback)((e=>{const r=e.target.classList.contains("wc-block-price-filter__range-input--min"),o=+e.target.value,l=r?[Math.round(o/y)*y,n]:[t,Math.round(o/y)*y],s=H(l,c,i,y,r);a(s)}),[a,t,n,c,i,y]),N=(0,r.useCallback)((e=>{if(e.relatedTarget&&e.relatedTarget.classList&&e.relatedTarget.classList.contains("wc-block-price-filter__amount"))return;const r=e.target.classList.contains("wc-block-price-filter__amount--min");if(E>=h){const e=H([0,h],null,null,y,r);return a([parseInt(e[0],10),parseInt(e[1],10)])}const t=H([E,h],null,null,y,r);a(t)}),[a,y,E,h]),O=U(g,600),T=J()("wc-block-price-filter","wc-block-components-price-slider",u&&"wc-block-price-filter--has-input-fields",u&&"wc-block-components-price-slider--has-input-fields",p&&"wc-block-price-filter--has-filter-button",p&&"wc-block-components-price-slider--has-filter-button",!C&&"is-disabled",(m||x<=300)&&"wc-block-components-price-slider--is-input-inline"),B=j(w.current)?w.current.ownerDocument.activeElement:void 0,L=B&&B===w.current?y:1,M=B&&B===_.current?y:1,I=String(E/10**s.minorUnit),q=String(h/10**s.minorUnit),D=m&&x>300,G=(0,e.createElement)("div",{className:J()("wc-block-price-filter__range-input-wrapper","wc-block-components-price-slider__range-input-wrapper",{"is-loading":d&&f}),onMouseMove:R,onFocus:R},C&&(0,e.createElement)("div",{"aria-hidden":u},(0,e.createElement)("div",{className:"wc-block-price-filter__range-input-progress wc-block-components-price-slider__range-input-progress",style:F}),(0,e.createElement)("input",{type:"range",className:"wc-block-price-filter__range-input wc-block-price-filter__range-input--min wc-block-components-price-slider__range-input wc-block-components-price-slider__range-input--min","aria-label":(0,o.__)("Filter products by minimum price","woocommerce"),"aria-valuetext":I,value:Number.isFinite(t)?t:c,onChange:A,step:L,min:c,max:i,ref:w,disabled:d&&!C,tabIndex:u?-1:0}),(0,e.createElement)("input",{type:"range",className:"wc-block-price-filter__range-input wc-block-price-filter__range-input--max wc-block-components-price-slider__range-input wc-block-components-price-slider__range-input--max","aria-label":(0,o.__)("Filter products by maximum price","woocommerce"),"aria-valuetext":q,value:Number.isFinite(n)?n:i,onChange:A,step:M,min:c,max:i,ref:_,disabled:d,tabIndex:u?-1:0}))),Q=e=>`wc-block-price-filter__amount wc-block-price-filter__amount--${e} wc-block-form-text-input wc-block-components-price-slider__amount wc-block-components-price-slider__amount--${e}`,V={currency:s,decimalScale:0},Y={...V,displayType:"input",allowNegative:!1,disabled:d||!C,onBlur:N};return(0,e.createElement)("div",{className:T,ref:S},(!D||!u)&&G,u&&(0,e.createElement)("div",{className:"wc-block-price-filter__controls wc-block-components-price-slider__controls"},f?(0,e.createElement)("div",{className:"input-loading"}):(0,e.createElement)(X.FormattedMonetaryAmount,{...Y,className:Q("min"),"aria-label":(0,o.__)("Filter products by minimum price","woocommerce"),isAllowed:te({minConstraint:c,minorUnit:s.minorUnit,currentMaxValue:h}),onValueChange:e=>{e!==E&&v(e)},value:E}),D&&G,f?(0,e.createElement)("div",{className:"input-loading"}):(0,e.createElement)(X.FormattedMonetaryAmount,{...Y,className:Q("max"),"aria-label":(0,o.__)("Filter products by maximum price","woocommerce"),isAllowed:re({maxConstraint:i,minorUnit:s.minorUnit}),onValueChange:e=>{e!==h&&k(e)},value:h})),!u&&!f&&Number.isFinite(t)&&Number.isFinite(n)&&(0,e.createElement)("div",{className:"wc-block-price-filter__range-text wc-block-components-price-slider__range-text"},(0,e.createElement)(X.FormattedMonetaryAmount,{...V,value:t}),(0,e.createElement)(X.FormattedMonetaryAmount,{...V,value:n})),(0,e.createElement)("div",{className:"wc-block-components-price-slider__actions"},(b||!f&&(t!==c||n!==i))&&(0,e.createElement)(ne,{onClick:()=>{a([c,i]),O()},screenReaderLabel:(0,o.__)("Reset price filter","woocommerce")}),p&&(0,e.createElement)(ee,{className:"wc-block-price-filter__button wc-block-components-price-slider__button",isLoading:f,disabled:d||!C,onClick:g,screenReaderLabel:(0,o.__)("Apply price filter","woocommerce")})))};t(1753);const ce=({children:r})=>(0,e.createElement)("div",{className:"wc-block-filter-title-placeholder"},r),ie=window.wc.priceFormat,ae=window.wp.url,le=e=>"boolean"==typeof e,se=(0,c.getSettingWithCoercion)("isRenderingPhpTemplate",!1,le);function ue(e){return window?(0,ae.getQueryArg)(window.location.href,e):null}function pe(e){se?((e=e.replace(/(?:query-(?:\d+-)?page=(\d+))|(?:page\/(\d+))/g,"")).endsWith("?")&&(e=e.slice(0,-1)),window.location.href=e):window.history.replaceState({},"",e)}const me=e=>"string"==typeof e,de="ROUND_UP",fe="ROUND_DOWN",be=(e,r,t)=>{const n=10*10**r;let o=null;const c=parseFloat(e);isNaN(c)||(t===de?o=Math.ceil(c/n)*n:t===fe&&(o=Math.floor(c/n)*n));const i=P(o,Number.isFinite);return Number.isFinite(o)?o:i};t(9432);const ge=(0,r.createContext)({});function we(e,r){return Number(e)*10**r}const _e=JSON.parse('{"Y4":{"D8":{"Z":3}}}');(e=>{const r=document.body.querySelectorAll(S.join(",")),{Block:t,getProps:n,getErrorBoundaryProps:o,selector:c}=e;(({Block:e,getProps:r,getErrorBoundaryProps:t,selector:n,wrappers:o})=>{const c=document.body.querySelectorAll(n);o&&o.length>0&&Array.prototype.filter.call(c,(e=>!((e,r)=>Array.prototype.some.call(r,(r=>r.contains(e)&&!r.isSameNode(e))))(e,o))),x({Block:e,containers:c,getProps:r,getErrorBoundaryProps:t})})({Block:t,getProps:n,getErrorBoundaryProps:o,selector:c,wrappers:r}),Array.prototype.forEach.call(r,(r=>{r.addEventListener("wc-blocks_render_blocks_frontend",(()=>{(({Block:e,getProps:r,getErrorBoundaryProps:t,selector:n,wrapper:o})=>{const c=o.querySelectorAll(n);x({Block:e,containers:c,getProps:r,getErrorBoundaryProps:t})})({...e,wrapper:r})}))}))})({selector:".wp-block-woocommerce-price-filter",Block:({attributes:t,isEditor:n=!1})=>{const o=(()=>{const{wrapper:e}=(0,r.useContext)(ge);return r=>{e&&e.current&&(e.current.hidden=!r)}})(),i=(0,c.getSettingWithCoercion)("hasFilterableProducts",!1,le),a=(0,c.getSettingWithCoercion)("isRenderingPhpTemplate",!1,le),[l,s]=(0,r.useState)(!1),u=ue("min_price"),p=ue("max_price"),[m]=T(),{results:d,isLoading:f}=z({queryPrices:!0,queryState:m,isEditor:n}),b=(0,ie.getCurrencyFromPriceResponse)(I(d,"price_range")?d.price_range:void 0),[g,w]=B("min_price"),[_,y]=B("max_price"),[E,v]=(0,r.useState)(we(u,b.minorUnit)||null),[h,k]=(0,r.useState)(we(p,b.minorUnit)||null),{minConstraint:S,maxConstraint:x}=(({minPrice:e,maxPrice:r,minorUnit:t})=>({minConstraint:be(e||"",t,fe),maxConstraint:be(r||"",t,de)}))({minPrice:I(d,"price_range")&&I(d.price_range,"min_price")&&me(d.price_range.min_price)?d.price_range.min_price:void 0,maxPrice:I(d,"price_range")&&I(d.price_range,"max_price")&&me(d.price_range.max_price)?d.price_range.max_price:void 0,minorUnit:b.minorUnit});(0,r.useEffect)((()=>{l||(w(we(u,b.minorUnit)),y(we(p,b.minorUnit)),s(!0))}),[b.minorUnit,l,p,u,y,w]);const[C,F]=(0,r.useState)(f),R=(0,r.useCallback)(((e,r)=>{const t=r>=Number(x)?void 0:r,n=e<=Number(S)?void 0:e;if(window){const e=function(e,r){const t={};for(const[e,n]of Object.entries(r))n?t[e]=n.toString():delete t[e];const n=(0,ae.removeQueryArgs)(e,...Object.keys(r));return(0,ae.addQueryArgs)(n,t)}(window.location.href,{min_price:n/10**b.minorUnit,max_price:t/10**b.minorUnit});window.location.href!==e&&pe(e)}w(n),y(t)}),[S,x,w,y,b.minorUnit]),A=U(R,500),N=(0,r.useCallback)((e=>{F(!0),e[0]!==E&&v(e[0]),e[1]!==h&&k(e[1]),a&&l&&!t.showFilterButton&&A(e[0],e[1])}),[E,h,v,k,a,l,A,t.showFilterButton]);(0,r.useEffect)((()=>{t.showFilterButton||a||A(E,h)}),[E,h,t.showFilterButton,A,a]);const O=P(g),L=P(_),M=P(S),j=P(x);if((0,r.useEffect)((()=>{(!Number.isFinite(E)||g!==O&&g!==E||S!==M&&S!==E)&&v(Number.isFinite(g)?g:S),(!Number.isFinite(h)||_!==L&&_!==h||x!==j&&x!==h)&&k(Number.isFinite(_)?_:x)}),[E,h,g,_,S,x,M,j,O,L]),!i)return o(!1),null;if(!f&&(null===S||null===x||S===x))return o(!1),null;const q=`h${t.headingLevel}`;o(!0),!f&&C&&F(!1);const D=(0,e.createElement)(q,{className:"wc-block-price-filter__title"},t.heading),G=f&&C?(0,e.createElement)(ce,null,D):D;return(0,e.createElement)(e.Fragment,null,!n&&t.heading&&G,(0,e.createElement)("div",{className:"wc-block-price-slider"},(0,e.createElement)(oe,{minConstraint:S,maxConstraint:x,minPrice:E,maxPrice:h,currency:b,showInputFields:t.showInputFields,inlineInput:t.inlineInput,showFilterButton:t.showFilterButton,onChange:N,onSubmit:()=>R(E,h),isLoading:f,isUpdating:C,isEditor:n})))},getProps:e=>{return{attributes:(r=e.dataset,{heading:me(null==r?void 0:r.heading)?r.heading:"",headingLevel:me(null==r?void 0:r.headingLevel)&&parseInt(r.headingLevel,10)||_e.Y4.D8.Z,showFilterButton:"true"===(null==r?void 0:r.showFilterButton),showInputFields:"false"!==(null==r?void 0:r.showInputFields),inlineInput:"true"===(null==r?void 0:r.inlineInput)}),isEditor:!1};var r}})})()})();
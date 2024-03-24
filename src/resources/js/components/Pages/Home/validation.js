const rules = {
    linkOlx: (val) => {
        const reg = new RegExp("^https?://(www|m).olx.ua[\\w\\W]+");
        return reg.test(val) ? true : 'Вставте посилання з OLX';
    },
}


export default rules;

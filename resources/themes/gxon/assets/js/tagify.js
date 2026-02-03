document.addEventListener('DOMContentLoaded', () => {

    /* =====================================
       BASIC TAGIFY INPUTS
    ===================================== */
    const tagifyInputs = document.querySelectorAll('.tagify-input');

    if (tagifyInputs.length && window.Tagify) {
        tagifyInputs.forEach(el => {
            new Tagify(el, {
                placeholder: 'Type something...'
            });
        });
    }

    /* =====================================
       TAGIFY USERS LIST
    ===================================== */
    const tagifyUsersList = document.querySelector('.tagify-users-list');

    if (tagifyUsersList && window.Tagify) {

        const escapeHTML = (str) =>
            typeof str === 'string'
                ? str.replace(/&/g, '&amp;')
                     .replace(/</g, '&lt;')
                     .replace(/>/g, '&gt;')
                     .replace(/"/g, '&quot;')
                     .replace(/`|'/g, '&#039;')
                : str;

        const validateEmail = email =>
            /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

        const parseFullValue = value => {
            const parts = value.split(/<(.*?)>/g);
            return {
                name: parts[0]?.trim(),
                email: parts[1]?.trim()
            };
        };

        const tagTemplate = function (tagData) {
            return `
                <tag title="${escapeHTML(tagData.email)}"
                    contenteditable="false"
                    spellcheck="false"
                    class="tagify__tag ${tagData.class || ''}"
                    ${this.getAttributes(tagData)}>
                    <x class="tagify__tag__removeBtn"></x>
                    <div>
                        <div class="tagify__tag__avatar-wrap">
                            <img src="${tagData.avatar}" onerror="this.style.visibility='hidden'">
                        </div>
                        <span class="tagify__tag-text">${escapeHTML(tagData.name)}</span>
                    </div>
                </tag>`;
        };

        const suggestionItemTemplate = function (tagData) {
            return `
                <div ${this.getAttributes(tagData)}
                     class="tagify__dropdown__item ${tagData.class || ''}">
                    ${tagData.avatar ? `
                        <div class="tagify__dropdown__item__avatar-wrap">
                            <img src="${tagData.avatar}" onerror="this.style.visibility='hidden'">
                        </div>` : ''}
                    <strong>${escapeHTML(tagData.name)}</strong>
                    <span>${escapeHTML(tagData.email)}</span>
                </div>`;
        };

        const tagify = new Tagify(tagifyUsersList, {
            tagTextProp: 'name',
            skipInvalid: true,
            dropdown: {
                enabled: 0,
                closeOnSelect: false,
                classname: 'users-list',
                searchKeys: ['name', 'email']
            },
            templates: {
                tag: tagTemplate,
                dropdownItem: suggestionItemTemplate
            },
            whitelist: [
                { value: 1, name: 'Sophia Hall', avatar: 'assets/images/avatar/avatar1.jpg', email: 'sophia@example.com' },
                { value: 2, name: 'Emma Smith', avatar: 'assets/images/avatar/avatar2.jpg', email: 'emma@example.com' },
                { value: 3, name: 'Olivia Clark', avatar: 'assets/images/avatar/avatar3.jpg', email: 'olivia@example.com' },
                { value: 4, name: 'Ava Lewis', avatar: 'assets/images/avatar/avatar4.jpg', email: 'avalewis@example.com' },
                { value: 5, name: 'Isabella Walker', avatar: 'assets/images/avatar/avatar5.jpg', email: 'isabella@example.com' }
            ],
            transformTag(tagData) {
                const parsed = parseFullValue(tagData.name);
                tagData.name = parsed.name;
                tagData.email = parsed.email || tagData.email;
            },
            validate({ name, email }) {
                if (!email && name) {
                    const parsed = parseFullValue(name);
                    name = parsed.name;
                    email = parsed.email;
                }
                if (!name) return 'Missing name';
                if (!validateEmail(email)) return 'Invalid email';
                return true;
            }
        });

        tagify.on('edit:start', ({ detail }) => {
            const { tag, data } = detail;
            tagify.setTagTextNode(tag, `${data.name} <${data.email}>`);
        });
    }

    /* =====================================
       ADVANCE OPTIONS TAGIFY
    ===================================== */
    const advancedInput = document.querySelector('.tagify-advance-options');

    if (advancedInput && window.Tagify) {

        const bootstrapColors = [
            '--bs-primary',
            '--bs-success',
            '--bs-danger',
            '--bs-warning',
            '--bs-info',
            '--bs-secondary',
            '--bs-dark'
        ];

        let colorIndex = 0;

        const tagifyAdvanced = new Tagify(advancedInput, {
            pattern: /^.{0,20}$/,
            delimiters: ',| ',
            maxTags: 6,
            blacklist: ['foo', 'bar', 'baz'],
            whitelist: [
                'James Anderson', 'William Johnson', 'Benjamin Martinez',
                'Michael Davis', 'Matthew Taylor', 'David Wilson',
                'Anthony Thomas', 'Christopher Moore', 'Emma Smith'
            ],
            placeholder: 'Type something',
            transformTag(tagData) {
                const color = bootstrapColors[colorIndex % bootstrapColors.length];
                tagData.style = `--tag-bg: var(${color})`;
                tagData.class = 'tag-color';

                if (tagData.value.toLowerCase() === 'shit') {
                    tagData.value = 's✲✲t';
                }
                colorIndex++;
            },
            dropdown: {
                enabled: 1,
                position: 'text',
                caseSensitive: true
            }
        });

        const updatePlaceholder = () => {
            tagifyAdvanced.setPlaceholder(
                `${tagifyAdvanced.value.length || 'no'} tags added`
            );
        };

        updatePlaceholder();
        tagifyAdvanced.on('change', updatePlaceholder);

        let debounce;
        tagifyAdvanced.on('click', e => {
            clearTimeout(debounce);
            debounce = setTimeout(() => {
                const color = bootstrapColors[colorIndex % bootstrapColors.length];
                e.detail.data.style = `--tag-bg: var(${color})`;
                colorIndex++;
                tagifyAdvanced.replaceTag(e.detail.tag, e.detail.data);
            }, 200);
        });

        tagifyAdvanced.on('dblclick', () => clearTimeout(debounce));
    }

});

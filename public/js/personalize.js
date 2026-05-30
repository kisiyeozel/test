(function() {
    'use strict';

    var state = {
        name: localStorage.getItem('kisiyeozel_name') || '',
        accentColor: localStorage.getItem('kisiyeozel_accent') || '',
        birthday: localStorage.getItem('kisiyeozel_birthday') || '',
        note: localStorage.getItem('kisiyeozel_note') || '',
        favorites: JSON.parse(localStorage.getItem('kisiyeozel_favorites') || '[]')
    };

    var colorPresets = [
        '#8b5cf6', '#ec4899', '#3b82f6', '#10b981',
        '#f59e0b', '#ef4444', '#06b6d4', '#a855f7'
    ];

    function init() {
        applyAccentColor();
        updateGreeting();
        updateBirthday();
        updateNote();
        updateFavorites();
        setupPanel();
        setupNameInput();
        setupColorPicker();
        setupBirthdayInput();
        setupNoteInput();
        setupFavoriteButtons();

        if (!state.name) {
            showWelcomeModal();
        } else {
            applyNameEverywhere();
        }

        showRadioArrow();
    }

    function showRadioArrow() {
        var radioPlayed = localStorage.getItem('kisiyeozel_radio_played');
        if (radioPlayed === 'true') return;

        var arrow = document.createElement('div');
        arrow.className = 'radio-arrow-indicator';
        arrow.id = 'radioArrow';
        arrow.innerHTML = '<div class="radio-arrow-bubble"><i class="fas fa-music"></i> Radyomuzu dinle!</div>';

        arrow.addEventListener('click', function() {
            var radioBtn = document.getElementById('radioToggle');
            if (radioBtn) radioBtn.click();
        });

        document.body.appendChild(arrow);

        var radioToggle = document.getElementById('radioToggle');
        if (radioToggle) {
            radioToggle.addEventListener('click', function() {
                hideRadioArrow();
            }, { once: true });
        }

        setTimeout(function() {
            hideRadioArrow();
        }, 15000);
    }

    function hideRadioArrow() {
        var arrow = document.getElementById('radioArrow');
        if (arrow) {
            arrow.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            arrow.style.opacity = '0';
            arrow.style.transform = 'translateY(-10px)';
            setTimeout(function() { arrow.remove(); }, 400);
        }
        localStorage.setItem('kisiyeozel_radio_played', 'true');
    }

    function applyAccentColor() {
        if (state.accentColor) {
            document.documentElement.style.setProperty('--accent', state.accentColor);
            document.documentElement.style.setProperty('--accent-light', state.accentColor + 'cc');
            document.documentElement.style.setProperty('--accent-dark', state.accentColor);
            document.documentElement.style.setProperty('--accent-glow', state.accentColor + '66');
        }
    }

    function applyNameEverywhere() {
        var greetingEl = document.getElementById('personalGreeting');
        if (greetingEl && state.name) {
            var hour = new Date().getHours();
            var timeGreeting;
            if (hour < 6) timeGreeting = 'İyi geceler';
            else if (hour < 12) timeGreeting = 'Günaydın';
            else if (hour < 18) timeGreeting = 'İyi günler';
            else timeGreeting = 'İyi akşamlar';

            greetingEl.innerHTML = '<i class="fas fa-sparkles"></i> ' + timeGreeting + ', ' + escapeHtml(state.name) + '!';
            greetingEl.classList.add('visible');
        }

        var heroH1 = document.querySelector('.hero h1');
        if (heroH1 && state.name) {
            var messages = [
                'Hayalindeki<br>Hediyeyi Yarat, ' + escapeHtml(state.name),
                'Özel Tasarımın<br>Seni Bekliyor, ' + escapeHtml(state.name),
                'Kendine Özel<br>Bir Hediye Tasarla, ' + escapeHtml(state.name),
                'Farkını Hisset,<br>' + escapeHtml(state.name),
                'Yaratıcılığını<br>Konuştur, ' + escapeHtml(state.name),
                'Kusursuz Hediye<br>Burada, ' + escapeHtml(state.name),
                'Tarzını Yansıt,<br>' + escapeHtml(state.name)
            ];
            heroH1.innerHTML = messages[Math.floor(Math.random() * messages.length)];
        }

        var footerNote = document.getElementById('footerNote');
        var note = localStorage.getItem('kisiyeozel_note');
        if (note && footerNote) {
            footerNote.innerHTML = '<i class="fas fa-note-sticky" style="margin-right:8px;color:var(--accent-light);"></i>' + note;
            footerNote.style.display = 'block';
        }
    }

    function showWelcomeModal() {
        var overlay = document.createElement('div');
        overlay.id = 'welcomeOverlay';
        overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,0.7);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);z-index:99999;display:flex;align-items:center;justify-content:center;animation:fadeIn 0.4s ease;';

        var modal = document.createElement('div');
        modal.style.cssText = 'background:var(--surface);border:1px solid var(--glass-border);border-radius:32px;padding:clamp(36px,5vw,56px);max-width:440px;width:90%;text-align:center;box-shadow:0 24px 80px rgba(0,0,0,0.5);animation:modalSlide 0.5s cubic-bezier(0.34,1.56,0.64,1);';

        modal.innerHTML = '<div style="width:80px;height:80px;background:var(--gradient-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 28px;font-size:36px;box-shadow:0 8px 32px var(--accent-glow);animation:pulse 2s ease-in-out infinite;"><i class="fas fa-gift" style="color:white;"></i></div>' +
            '<h2 style="font-size:clamp(1.5rem,4vw,2rem);margin-bottom:12px;background:var(--gradient-primary);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Hoş Geldin!</h2>' +
            '<p style="color:var(--text-secondary);font-size:15px;margin-bottom:32px;line-height:1.7;">Sana özel bir deneyim sunmak için<br>adını öğrenmek istiyoruz 💜</p>' +
            '<div style="position:relative;margin-bottom:24px;">' +
            '<input type="text" id="welcomeNameInput" placeholder="Adın ne?" maxlength="30" style="width:100%;padding:16px 20px;background:var(--glass);border:2px solid var(--glass-border);border-radius:16px;color:var(--text);font-size:16px;font-family:inherit;text-align:center;transition:0.3s;outline:none;" />' +
            '</div>' +
            '<button id="welcomeNameSave" style="width:100%;padding:16px;background:var(--gradient-primary);border:none;border-radius:16px;color:white;font-size:16px;font-weight:700;cursor:pointer;transition:0.3s;font-family:inherit;box-shadow:0 8px 32px var(--accent-glow);">Devam Et <i class="fas fa-arrow-right" style="margin-left:8px;"></i></button>' +
            '<p style="color:var(--text-muted);font-size:12px;margin-top:16px;">İstediğin zaman kişiselleştirme panelinden değiştirebilirsin</p>';

        overlay.appendChild(modal);
        document.body.appendChild(overlay);
        document.body.style.overflow = 'hidden';

        var input = document.getElementById('welcomeNameInput');
        var saveBtn = document.getElementById('welcomeNameSave');

        setTimeout(function() { input.focus(); }, 500);

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') saveName();
        });

        saveBtn.addEventListener('click', saveName);

        function saveName() {
            var name = input.value.trim();
            if (name.length < 2) {
                input.style.borderColor = '#ef4444';
                input.style.boxShadow = '0 0 0 4px rgba(239,68,68,0.2)';
                input.placeholder = 'Lütfen adını yaz...';
                input.focus();
                return;
            }

            state.name = name;
            localStorage.setItem('kisiyeozel_name', name);

            overlay.style.animation = 'fadeOut 0.3s ease forwards';
            setTimeout(function() {
                overlay.remove();
                document.body.style.overflow = '';
                applyNameEverywhere();
                updateGreeting();
                updateBirthday();
            }, 300);
        }

        var style = document.createElement('style');
        style.textContent = '@keyframes modalSlide{from{opacity:0;transform:translateY(30px) scale(0.95);}to{opacity:1;transform:translateY(0) scale(1);}}@keyframes fadeOut{from{opacity:1;}to{opacity:0;}}';
        document.head.appendChild(style);
    }

    function updateGreeting() {
        var greetingEl = document.getElementById('personalGreeting');
        if (!greetingEl || !state.name) return;

        var hour = new Date().getHours();
        var timeGreeting;
        if (hour < 6) timeGreeting = 'İyi geceler';
        else if (hour < 12) timeGreeting = 'Günaydın';
        else if (hour < 18) timeGreeting = 'İyi günler';
        else timeGreeting = 'İyi akşamlar';

        greetingEl.innerHTML = '<i class="fas fa-sparkles"></i> ' + timeGreeting + ', ' + escapeHtml(state.name) + '!';
        greetingEl.classList.add('visible');
    }

    function updateBirthday() {
        var container = document.getElementById('birthdayContainer');
        if (!container || !state.birthday) return;

        var today = new Date();
        var birthday = new Date(state.birthday);
        var nextBirthday = new Date(today.getFullYear(), birthday.getMonth(), birthday.getDate());

        if (nextBirthday < today) {
            nextBirthday.setFullYear(nextBirthday.getFullYear() + 1);
        }

        var diffTime = nextBirthday - today;
        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        if (diffDays === 0 || (today.getMonth() === birthday.getMonth() && today.getDate() === birthday.getDate())) {
            container.innerHTML = '<div class="birthday-today"><i class="fas fa-cake-candles"></i><div>Doğum günün kutlu olsun, ' + escapeHtml(state.name) + '! 🎉</div></div>';
        } else {
            container.innerHTML = '<div class="birthday-countdown"><div class="days">' + diffDays + '</div><div class="label">doğum gününe kaldı</div></div>';
        }
    }

    function updateNote() {
        var displayEl = document.getElementById('noteDisplay');
        var editEl = document.getElementById('noteEdit');
        if (!displayEl || !editEl) return;

        if (state.note) {
            displayEl.innerHTML = escapeHtml(state.note) + '<button class="note-edit" onclick="Personalize.editNote()"><i class="fas fa-pen"></i></button>';
            displayEl.style.display = 'block';
            editEl.style.display = 'none';
        } else {
            displayEl.style.display = 'none';
            editEl.style.display = 'block';
        }
    }

    function updateFavorites() {
        var listEl = document.getElementById('favoritesList');
        if (!listEl) return;

        if (state.favorites.length === 0) {
            listEl.innerHTML = '<div class="favorites-empty"><i class="far fa-heart"></i><div>Henüz favori ürün yok</div></div>';
            return;
        }

        var html = '';
        state.favorites.forEach(function(fav) {
            html += '<div class="favorite-item">' +
                (fav.image ? '<img src="img/' + escapeHtml(fav.image) + '" alt="">' : '<div style="width:40px;height:40px;background:var(--glass);border-radius:6px;display:flex;align-items:center;justify-content:center;">🎁</div>') +
                '<div class="fav-info"><div class="fav-name">' + escapeHtml(fav.name) + '</div><div class="fav-price">₺' + escapeHtml(fav.price) + '</div></div>' +
                '<button class="fav-remove" onclick="Personalize.removeFavorite(' + fav.id + ')"><i class="fas fa-trash"></i></button>' +
                '</div>';
        });
        listEl.innerHTML = html;
    }

    function setupPanel() {
        var trigger = document.getElementById('personalizeTrigger');
        var panel = document.getElementById('personalizePanel');
        var overlay = document.getElementById('personalizeOverlay');
        var closeBtn = document.getElementById('panelClose');

        if (trigger) {
            trigger.addEventListener('click', function() {
                panel.classList.add('active');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }

        function closePanel() {
            panel.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (closeBtn) closeBtn.addEventListener('click', closePanel);
        if (overlay) overlay.addEventListener('click', closePanel);

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closePanel();
        });
    }

    function setupNameInput() {
        var nameInput = document.getElementById('nameInput');
        var nameSave = document.getElementById('nameSave');
        var nameDisplay = document.getElementById('nameDisplay');
        var nameText = document.getElementById('nameText');
        var nameChange = document.getElementById('nameChange');

        if (state.name) {
            if (nameInput) nameInput.style.display = 'none';
            if (nameSave) nameSave.style.display = 'none';
            if (nameDisplay) {
                nameDisplay.style.display = 'flex';
                if (nameText) nameText.textContent = state.name;
            }
        } else {
            if (nameDisplay) nameDisplay.style.display = 'none';
        }

        if (nameSave) {
            nameSave.addEventListener('click', function() {
                var name = nameInput.value.trim();
                if (name) {
                    state.name = name;
                    localStorage.setItem('kisiyeozel_name', name);
                    updateGreeting();
                    updateBirthday();
                    applyNameEverywhere();
                    nameInput.style.display = 'none';
                    nameSave.style.display = 'none';
                    nameDisplay.style.display = 'flex';
                    nameText.textContent = name;
                }
            });
        }

        if (nameChange) {
            nameChange.addEventListener('click', function() {
                nameInput.style.display = 'flex';
                nameSave.style.display = 'block';
                nameDisplay.style.display = 'none';
                nameInput.value = state.name;
                nameInput.focus();
            });
        }
    }

    function setupColorPicker() {
        var colorInput = document.getElementById('colorInput');
        var presets = document.querySelectorAll('.color-preset');

        if (colorInput && state.accentColor) {
            colorInput.value = state.accentColor;
        }

        if (colorInput) {
            colorInput.addEventListener('input', function() {
                state.accentColor = this.value;
                localStorage.setItem('kisiyeozel_accent', this.value);
                applyAccentColor();
                presets.forEach(function(p) { p.classList.remove('active'); });
            });
        }

        presets.forEach(function(preset) {
            if (state.accentColor && preset.dataset.color === state.accentColor) {
                preset.classList.add('active');
            }
            preset.addEventListener('click', function() {
                state.accentColor = this.dataset.color;
                localStorage.setItem('kisiyeozel_accent', this.dataset.color);
                applyAccentColor();
                presets.forEach(function(p) { p.classList.remove('active'); });
                this.classList.add('active');
                if (colorInput) colorInput.value = this.dataset.color;
            });
        });
    }

    function setupBirthdayInput() {
        var birthdayInput = document.getElementById('birthdayInput');
        if (state.birthday && birthdayInput) {
            birthdayInput.value = state.birthday;
        }
        if (birthdayInput) {
            birthdayInput.addEventListener('change', function() {
                state.birthday = this.value;
                localStorage.setItem('kisiyeozel_birthday', this.value);
                updateBirthday();
            });
        }
    }

    function setupNoteInput() {
        var noteInput = document.getElementById('noteInput');
        var noteSave = document.getElementById('noteSave');
        if (state.note && noteInput) {
            noteInput.value = state.note;
        }
        if (noteSave) {
            noteSave.addEventListener('click', function() {
                state.note = noteInput.value.trim();
                localStorage.setItem('kisiyeozel_note', state.note);
                updateNote();
            });
        }
    }

    function setupFavoriteButtons() {
        document.querySelectorAll('.product-fav-btn').forEach(function(btn) {
            var productId = btn.dataset.productId;
            if (state.favorites.some(function(f) { return f.id == productId; })) {
                btn.classList.add('active');
                btn.innerHTML = '<i class="fas fa-heart"></i>';
            }

            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleFavorite(productId, btn);
            });
        });
    }

    function toggleFavorite(productId, btn) {
        var card = btn.closest('.product-card');
        var name = card ? card.querySelector('.product-title') : null;
        var price = card ? card.querySelector('.product-price') : null;
        var image = card ? card.querySelector('.product-image img') : null;

        var existingIndex = state.favorites.findIndex(function(f) { return f.id == productId; });

        if (existingIndex > -1) {
            state.favorites.splice(existingIndex, 1);
            btn.classList.remove('active');
            btn.innerHTML = '<i class="far fa-heart"></i>';
        } else {
            state.favorites.push({
                id: productId,
                name: name ? name.textContent : 'Ürün',
                price: price ? price.textContent.replace('₺', '').trim() : '0',
                image: image ? image.src.split('/').pop() : ''
            });
            btn.classList.add('active');
            btn.innerHTML = '<i class="fas fa-heart"></i>';
        }

        localStorage.setItem('kisiyeozel_favorites', JSON.stringify(state.favorites));
        updateFavorites();

        fetch('favori-ekle.php?id=' + productId, { credentials: 'same-origin' }).catch(function() {});
    }

    function escapeHtml(text) {
        var div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    window.Personalize = {
        editNote: function() {
            var displayEl = document.getElementById('noteDisplay');
            var editEl = document.getElementById('noteEdit');
            if (displayEl) displayEl.style.display = 'none';
            if (editEl) {
                editEl.style.display = 'block';
                var input = document.getElementById('noteInput');
                if (input) {
                    input.value = state.note;
                    input.focus();
                }
            }
        },
        removeFavorite: function(id) {
            state.favorites = state.favorites.filter(function(f) { return f.id !== id; });
            localStorage.setItem('kisiyeozel_favorites', JSON.stringify(state.favorites));
            updateFavorites();
            var btn = document.querySelector('.product-fav-btn[data-product-id="' + id + '"]');
            if (btn) {
                btn.classList.remove('active');
                btn.innerHTML = '<i class="far fa-heart"></i>';
            }
        },
        getState: function() { return state; }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();

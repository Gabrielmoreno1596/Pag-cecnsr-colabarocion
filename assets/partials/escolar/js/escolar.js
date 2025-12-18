(function (window) {
  const School = (window.CECNSRSchool = window.CECNSRSchool || {});

  document.addEventListener("DOMContentLoaded", () => {
    School.levelbar?.init?.();
    School.bachDropdown?.init?.();
    School.checklist?.init?.();
    School.actions?.init?.();
  });
})(window);

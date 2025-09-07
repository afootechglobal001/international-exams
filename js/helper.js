function formatExamDate(examDate) {
  if (!examDate) return "";

  const date = new Date(examDate);

  return date.toLocaleDateString("en-US", {
    weekday: "long", // Saturday
    year: "numeric", // 2025
    month: "long", // May
    day: "2-digit", // 03
  });
}
